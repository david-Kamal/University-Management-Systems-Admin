package com.reham.Modules;
/**
 * Created by david on 3/29/19.
 */

public class SignupReq
{
    private String username, password;

    public SignupReq(String username, String password) {
        this.username = username;
        this.password = password;
    }

    public String getUsername() {

        return username;
    }

    public String getPassword() {
        return password;
    }
}
