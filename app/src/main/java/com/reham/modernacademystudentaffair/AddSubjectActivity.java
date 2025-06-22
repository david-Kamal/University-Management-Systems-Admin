package com.reham.modernacademystudentaffair;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Spinner;

public class AddSubjectActivity extends AppCompatActivity implements AdapterView.OnItemSelectedListener {

    private Spinner prequisitSpinner;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_add_subject);

        setTitle("Add Subject");

        prequisitSpinner = (Spinner) findViewById(R.id.prequisitSpinner);


        ArrayAdapter<CharSequence> subjectAdapter = ArrayAdapter.createFromResource(this,R.array.subject_array,android.R.layout.simple_spinner_item);
        subjectAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        prequisitSpinner.setAdapter(subjectAdapter);

        prequisitSpinner.setOnItemSelectedListener(this);




    }

    @Override
    public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {

    }

    @Override
    public void onNothingSelected(AdapterView<?> parent) {

    }
}
