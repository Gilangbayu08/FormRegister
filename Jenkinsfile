pipeline {
    agent any

    stages {

        stage('Clone') {
            steps {
                git branch: 'main', url: 'https://github.com/Gilangbayu08/FormRegister.git'
            }
        }

        stage('Install Dependency') {
            steps {
                sh 'composer install'
            }
        }

        stage('Setup Laravel') {
            steps {
                sh 'cp .env.example .env'
                sh 'php artisan key:generate'
            }
        }

        stage('Deploy') {
            steps {
                sh 'php artisan serve --host=0.0.0.0 --port=8000 &'
            }
        }

    }
}