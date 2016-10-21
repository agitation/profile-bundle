ag.api.Endpoint.register({
    "profile.v1/Password.reset": [
        "profile.v1/Login",
        "common.v1/ScalarNull"
    ],
    "profile.v1/Session.login": [
        "profile.v1/Login",
        "common.v1/ScalarNull"
    ],
    "profile.v1/Session.logout": [
        "common.v1/ScalarNull",
        "common.v1/ScalarNull"
    ]
});
ag.api.Object.register({
    "profile.v1/Login": {
        "props": {
            "email": {
                "type": "string"
            },
            "password": {
                "type": "string"
            }
        }
    }
});
