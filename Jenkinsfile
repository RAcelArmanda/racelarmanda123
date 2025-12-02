pipeline {
    agent any

    stages {

        stage('Checkout from GitHub') {
            steps {
                // Checkout kode dari GitHub
                git branch: 'main',
                    url: 'https://github.com/RAcelArmanda/racelarmanda123.git'
            }
        }

        stage('Install Dependencies') {
            steps {
                powershell '''
                echo "Installing PHP dependencies via Composer..."
                composer install
                '''
            }
        }

        stage('Run PHP App') {
            steps {
                powershell '''
                echo "Running PHP application..."
                php index.php
                '''
            }
        }

        stage('Run Unit Tests') {
            steps {
                powershell '''
                echo "Running PHPUnit tests..."
                vendor\\bin\\phpunit --colors=always
                '''
            }
        }

    }

    post {
        always {
            echo 'Pipeline finished!'
        }
        success {
            echo 'Pipeline completed successfully!'
        }
        failure {
            echo 'Pipeline failed. Check the logs above.'
        }
    }
}
