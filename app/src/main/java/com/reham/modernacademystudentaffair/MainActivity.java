package com.reham.modernacademystudentaffair;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;

import com.reham.modernacademystudentaffair.R;

public class MainActivity extends AppCompatActivity {


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);


    }


    public void StudentRegistration(View view)
    {
        Intent intent = new Intent(MainActivity.this, RegistrationActivity.class);
        startActivity(intent);
    }


    public void TimeTable(View view)
    {
        Intent intent = new Intent(MainActivity.this, TimeTableActivity.class);
        startActivity(intent);
    }


    public void Exams(View view)
    {
        Intent intent = new Intent(MainActivity.this, ExamsActivity.class);
        startActivity(intent);
    }

    public void Attendance(View view)
    {
        Intent intent = new Intent(MainActivity.this, AttendanceActivity.class);
        startActivity(intent);
    }

    public void Doctor(View view)
    {
        Intent intent = new Intent(MainActivity.this, InsertDoctorActivity.class);
        startActivity(intent);
    }

    public void InsertSubject(View view)
    {
        Intent intent = new Intent(MainActivity.this,InsertDoctorSubjectActivity.class);
        startActivity(intent);
    }

    public void AddSubjects(View view)
    {
        Intent intent = new Intent(MainActivity.this,AddSubjectActivity.class);
        startActivity(intent);
    }

    public void Results(View view)
    {
        Intent intent = new Intent(MainActivity.this,ResultsActivity.class);
        startActivity(intent);
    }

    public void AddAdmin(View view)
    {
        Intent intent = new Intent(MainActivity.this,AddUserActivity.class);
        startActivity(intent);
    }
}
