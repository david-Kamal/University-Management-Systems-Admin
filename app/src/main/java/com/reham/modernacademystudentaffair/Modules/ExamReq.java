package com.reham.Modules;

public class ExamReq
{
    private String subjectName , subjectDate, subjectTime;

    public ExamReq(String subjectName, String subjectDate, String subjectTime) {
        this.subjectName = subjectName;
        this.subjectDate = subjectDate;
        this.subjectTime = subjectTime;
    }


    public String getSubjectName() {
        return subjectName;
    }

    public String getSubjectDate() {
        return subjectDate;
    }

    public String getSubjectTime() {
        return subjectTime;
    }
}
