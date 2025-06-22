package com.reham.Modules;

public class RegistrationReq
{

    private String id, fullname;
    private int password;


    public RegistrationReq(String id, String fullname, int password) {
        this.id = id;
        this.fullname = fullname;
        this.password = password;
    }


    public String getId() {
        return id;
    }

    public String getFullname() {
        return fullname;
    }

    public int getPassword() {
        return password;
    }
}
