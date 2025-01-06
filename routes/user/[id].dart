import 'package:dart_frog/dart_frog.dart';

Future<Response> onRequest(
  RequestContext context,
  String id,
) async {
  return switch (context.request.method) {
    HttpMethod.delete => _deleteUser(id),
    HttpMethod.put => _updateUser(id, context),
    _ => Future.value(Response(body: 'This is default')),
  };
}

Future<Response> _deleteUser(String id) async {
  return Response.json(body: {'message': 'user with id: $id is deleted!'});
}

Future<Response> _updateUser(String id, RequestContext context) async {
  final json = (await context.request.json()) as Map<String, dynamic>;
  final first_name = json['first_name'];
  final last_name = json['last_name'];
  final email = json['email'];

  return Response.json(body: {
    'message': 'Updated!',
    'user': {'first_name': first_name, 'last_name': last_name, 'email': email}
  });
}
