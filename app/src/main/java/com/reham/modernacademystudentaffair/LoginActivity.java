package com.reham.modernacademystudentaffair;

import android.content.Intent;
import android.support.design.widget.Snackbar;
import android.support.design.widget.TextInputEditText;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

public class LoginActivity extends AppCompatActivity {

    private Button fab_login;
    private View parent_view;
    private TextInputEditText mgetUserName;
    private TextInputEditText mgetPassword;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        parent_view = findViewById(android.R.id.content);
        fab_login = (Button) findViewById(R.id.fab_login);
        mgetUserName = (TextInputEditText) findViewById(R.id.getUserName);
        mgetPassword = (TextInputEditText) findViewById(R.id.getPassword);




        fab_login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(final View v) {


                attemptLogin();



                if (attemptLogin()) {
                    openMainActivity();
                    Toast.makeText(LoginActivity.this, "Hello", Toast.LENGTH_SHORT).show();
                    finish();


                } else {
                    Snackbar.make(parent_view, "ERROR", Snackbar.LENGTH_SHORT).show();

                }

            }
        });
    }




    public void openMainActivity(){
        Intent intent = new Intent(LoginActivity.this, MainActivity.class);
        startActivity(intent);
    }


    private boolean attemptLogin() {

        // Reset errors.
        mgetUserName.setError(null);
        mgetPassword.setError(null);

        // Store values at the time of the login attempt.
        String username = mgetUserName.getText().toString();
        String password = mgetPassword.getText().toString();




        if (password.isEmpty()) {
            mgetPassword.setError(getString(R.string.error_field_required));
            return false;
        }
        // Check for a valid password, if the user entered one.
        if (!isPasswordValid(password)) {
            mgetPassword.setError(getString(R.string.error_invalid_password));
            return false;
        }
        // Check for a valid email address.
        if (username.isEmpty()) {
            mgetUserName.setError(getString(R.string.error_field_required));
            return false;
        }

        return true;

    }



//    private void attemptLogins() {
//
//
//        // Reset errors.
//
//        mgetUserName.setError(null);
//        mgetPassword.setError(null);
//
//        // Store values at the time of the login attempt.
//        String username = mgetUserName.getText().toString();
//        String password = mgetPassword.getText().toString();
//
//        boolean cancel = false;
//        View focusView = null;
//
//        // Check for a valid password, if the user entered one.
//        if (!isPasswordValid(password)) {
//            mgetPassword.setError(getString(R.string.error_invalid_password));
//            focusView = mgetPassword;
//            cancel = true;
//        }
//
//        // Check for a valid email address.
//        if (TextUtils.isEmpty(username)) {
//            mgetUserName.setError(getString(R.string.error_field_required));
//            focusView = mgetUserName;
//            cancel = true;
//        }
//        if (TextUtils.isEmpty(password)) {
//            mgetPassword.setError(getString(R.string.error_field_required));
//            focusView = mgetPassword;
//            cancel = true;
//        }
//        if (cancel) {
//            // There was an error; don't attempt login and focus the first
//            // form field with an error.
//            focusView.requestFocus();
//        }
//        if (!cancel){
//
//            openChoosingActivity();
//                        Toast.makeText(MainActivity.this, "Hello", Toast.LENGTH_SHORT).show();
//
//
//                    } else {
//                        Snackbar.make(parent_view, "ERROR", Snackbar.LENGTH_SHORT).show();
//
//                    }
//
//                    finish();
//
//        }

    @Override
    public void onWindowFocusChanged(boolean hasFocus) {
        super.onWindowFocusChanged(hasFocus);
        if (hasFocus) {
            hideSystemUI();
        }
    }
    
    private void hideSystemUI() {
        // Enables regular immersive mode.
        // For "lean back" mode, remove SYSTEM_UI_FLAG_IMMERSIVE.
        // Or for "sticky immersive," replace it with SYSTEM_UI_FLAG_IMMERSIVE_STICKY
        View decorView = getWindow().getDecorView();
        decorView.setSystemUiVisibility(
                View.SYSTEM_UI_FLAG_IMMERSIVE
                        // Set the content to appear under the system bars so that the
                        // content doesn't resize when the system bars hide and show.
                        | View.SYSTEM_UI_FLAG_LAYOUT_STABLE
                        | View.SYSTEM_UI_FLAG_LAYOUT_HIDE_NAVIGATION
                        | View.SYSTEM_UI_FLAG_LAYOUT_FULLSCREEN
                        // Hide the nav bar and status bar
                        | View.SYSTEM_UI_FLAG_HIDE_NAVIGATION
                        | View.SYSTEM_UI_FLAG_FULLSCREEN);
    }

    // Shows the system bars by removing all the flags
// except for the ones that make the content appear under the system bars.
    private void showSystemUI() {
        View decorView = getWindow().getDecorView();
        decorView.setSystemUiVisibility(
                View.SYSTEM_UI_FLAG_LAYOUT_STABLE
                        | View.SYSTEM_UI_FLAG_LAYOUT_HIDE_NAVIGATION
                        | View.SYSTEM_UI_FLAG_LAYOUT_FULLSCREEN);
    }







    private boolean isPasswordValid(String password) {
        return password.length() >= 6;
    }
}
