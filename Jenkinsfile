pipeline {
    agent any

    stages {

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
