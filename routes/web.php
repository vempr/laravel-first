<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/jobs', function () {
    $jobs = [
        [
            "id" => 1,
            "title" => "Software Engineer",
            "salary" => 85000,
            "description" => "Design, develop, and maintain software applications for various business needs. Work collaboratively with cross-functional teams to deliver high-quality code."
        ],
        [
            "id" => 2,
            "title" => "Web Developer",
            "salary" => 75000,
            "description" => "Develop responsive and interactive websites using modern web technologies. Optimize website performance and ensure a seamless user experience."
        ],
        [
            "id" => 3,
            "title" => "DevOps Engineer",
            "salary" => 95000,
            "description" => "Automate deployment processes and manage cloud infrastructure for scalable applications. Ensure system reliability and security through continuous monitoring and improvement."
        ],
        [
            "id" => 4,
            "title" => "Data Scientist",
            "salary" => 105000,
            "description" => "Analyze large datasets to extract insights and drive business decisions. Develop machine learning models to predict trends and optimize processes."
        ],
        [
            "id" => 5,
            "title" => "Cybersecurity Analyst",
            "salary" => 90000,
            "description" => "Protect IT systems from security threats by implementing defensive strategies. Conduct risk assessments and ensure compliance with industry security standards."
        ]
    ];

    return view('jobs', ["jobs" => $jobs]);
});

Route::get('/jobs/{id}', function ($id) {
    $jobs = [
        [
            "id" => 1,
            "title" => "Software Engineer",
            "salary" => 85000,
            "description" => "Design, develop, and maintain software applications for various business needs. Work collaboratively with cross-functional teams to deliver high-quality code."
        ],
        [
            "id" => 2,
            "title" => "Web Developer",
            "salary" => 75000,
            "description" => "Develop responsive and interactive websites using modern web technologies. Optimize website performance and ensure a seamless user experience."
        ],
        [
            "id" => 3,
            "title" => "DevOps Engineer",
            "salary" => 95000,
            "description" => "Automate deployment processes and manage cloud infrastructure for scalable applications. Ensure system reliability and security through continuous monitoring and improvement."
        ],
        [
            "id" => 4,
            "title" => "Data Scientist",
            "salary" => 105000,
            "description" => "Analyze large datasets to extract insights and drive business decisions. Develop machine learning models to predict trends and optimize processes."
        ],
        [
            "id" => 5,
            "title" => "Cybersecurity Analyst",
            "salary" => 90000,
            "description" => "Protect IT systems from security threats by implementing defensive strategies. Conduct risk assessments and ensure compliance with industry security standards."
        ]
    ];

    $job = Arr::first($jobs, fn($job) => $job['id'] == $id);

    return view('job', ["job" => $job]);
});
