package com.reham.Modules;

/**
 * Created by david on 3/29/19.
 */
//
//{
//        "status": true,
//        "message": "Successfully Signup!",
//        "id": "4",
//        "username": "davidf"
//        }
public class SignupRes
{
    private String status;
    private String message, username;
    private int id;

    public SignupRes(String status, String message, String username, int id) {
        this.status = status;
        this.message = message;
        this.username = username;
        this.id = id;
    }

    public String getStatus() {
        return status;
    }

    public String getMessage() {
        return message;
    }

    public String getUsername() {
        return username;
    }

    public int getId() {
        return id;
    }
}
