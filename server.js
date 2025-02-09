require("dotenv").config();

const express = require("express");
const app = express();
const path = require("path");
const errorHandler = require("./middleware/errorHandler");
const cookieParser = require("cookie-parser");
const cors = require("cors");
const coreOptions = require("./config/corsOptions");
const connectDB = require("./config/dbConn");
const mongoose = require("mongoose");
const { logEvents, logger } = require("./middleware/logger");
const PORT = process.env.PORT || 3100;
const rootRouter = require("./routes/root");

console.log(process.env.NODE_ENV);

connectDB();

app.use(logger);

app.use(cors(coreOptions));

app.use(express.json());

app.use(cookieParser());

app.use("/", express.static(path.join(__dirname, "/public")));

app.use("/", rootRouter);

app.use("/users", require("./routes/userRoutes"));
app.use("/notes", require("./routes/noteRoutes"));

app.use("*", (req, res) => {
  res.status(404);
  if (req.accepts("html")) {
    res.sendFile(path.join(__dirname, "views", "404.html"));
  } else if (req.accepts("json")) {
    res.json({ message: "404 Not found" });
  } else {
    res.type("txt").send("404 Not found");
  }
});

app.use(errorHandler);

mongoose.connection.once("open", () => {
  console.log("Connected to MongoDB");
  app.listen(PORT, () => console.log(`Server running on port ${PORT}`));
});

mongoose.connection.once("error", (err) => {
  console.log(err);
  logEvents(
    `${err.no}: ${err.code}\t${err.syscall}\t${err.hostname}`,
    "mongoErrLog.log"
  );
});
