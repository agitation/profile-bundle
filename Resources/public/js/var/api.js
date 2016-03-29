agit.api.Endpoint.register({
    "profile.v1/Session.login": [
        "profile.v1/Login",
        "common.v1/Null"
    ],
    "profile.v1/Session.logout": [
        "common.v1/Null",
        "common.v1/Null"
    ]
});
agit.api.Object.register({
    "profile.v1/Login": {
        "email": {
            "type": "string"
        },
        "password": {
            "type": "string"
        }
    }
});
