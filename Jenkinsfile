pipeline {
    agent any

    stages {

        stage('Clone Repository') {
            steps {
                git branch: 'main', url: 'https://github.com/Gilangbayu08/FormRegister.git'
            }
        }

        stage('Build') {
            steps {
                echo 'Building Project...'
            }
        }

        stage('Deploy') {
            steps {
                echo 'Deploying Project...'
            }
        }

    }
}