import 'package:dart_frog/dart_frog.dart';

Future<Response> onRequest(RequestContext context) async {
  return switch (context.request.method) {
    HttpMethod.get => _getUsers(),
    HttpMethod.post => _createUser(context),
    _ => Future.value(Response(body: 'This is default')),
  };
}

Future<Response> _getUsers() {
  return Future.value(Response.json(body: [
    {'first_name': 'John', 'last_name': 'Doe', 'email': 'john.doe@example.com'},
    {
      'first_name': 'Jane',
      'last_name': 'Smith',
      'email': 'jane.smith@example.com'
    }
  ]));
}

Future<Response> _createUser(RequestContext context) async {
  final json = (await context.request.json()) as Map<String, dynamic>;
  final first_name = json['first_name'];
  final last_name = json['last_name'];
  final email = json['email'];

  return Response.json(body: {
    'message': 'Saved!',
    'user': {'first_name': first_name, 'last_name': last_name, 'email': email}
  });
}
