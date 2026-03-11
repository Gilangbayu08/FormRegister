pipeline {
    agent any

    stages {

        stage('Clone') {
            steps {
                git branch: 'main', url: 'git@github.com:Gilangbayu08/FormRegister.git'
            }
        }

        stage('Build') {
            steps {
                echo 'Build process running'
            }
        }

        stage('Deploy') {
            steps {
                echo 'Deploying project'
            }
        }

    }
}