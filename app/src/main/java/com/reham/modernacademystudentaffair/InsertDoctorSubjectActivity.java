package com.reham.modernacademystudentaffair;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Spinner;
import android.widget.Toast;

public class InsertDoctorSubjectActivity extends AppCompatActivity  implements AdapterView.OnItemSelectedListener {

    private Spinner subjectSpinner,doctorSpinner;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_insert_doctor_subject);

        subjectSpinner = (Spinner) findViewById(R.id.subjectSpinner);
        doctorSpinner = (Spinner)  findViewById(R.id.doctorSpinner);


        ArrayAdapter<CharSequence> subjectAdapter = ArrayAdapter.createFromResource(this,R.array.subject_array,android.R.layout.simple_spinner_item);
        subjectAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        subjectSpinner.setAdapter(subjectAdapter);

        subjectSpinner.setOnItemSelectedListener(this);





    }

    @Override
    public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
        String subjectSelected = parent.getItemAtPosition(position).toString();
        Toast.makeText(this, subjectSelected, Toast.LENGTH_SHORT).show();
    }

    @Override
    public void onNothingSelected(AdapterView<?> parent) {

    }
}
