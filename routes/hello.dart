import 'package:dart_frog/dart_frog.dart';

Response onRequest(RequestContext context) {
  if (context.request.method == HttpMethod.get) {
    return Response(body: 'This is a GET request!');
  }
  return Response(body: 'This is a POST request!');
}
