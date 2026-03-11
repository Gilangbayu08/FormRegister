pipeline {
    agent any

    stages {

        stage('Clone Repository') {
            steps {
                git branch: 'main', url: 'https://github.com/Gilangbayu08/FormRegister.git'
            }
        }

        stage('Install Dependency') {
            steps {
                sh 'composer install'
            }
        }

        stage('Setup Environment') {
            steps {
                sh '''
                if [ ! -f .env ]; then
                    cp .env.example .env
                fi
                php artisan key:generate
                '''
            }
        }

        stage('Database Migration') {
            steps {
                sh 'php artisan migrate --force'
            }
        }

        stage('Optimize Laravel') {
            steps {
                sh '''
                php artisan config:cache
                php artisan route:cache
                php artisan view:cache
                '''
            }
        }

    }
}
