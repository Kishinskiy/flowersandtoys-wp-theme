pipeline {
    agent any
    stages {
        stage('deploy to dev') {
            steps {
                withCredentials([usernamePassword(credentialsId: 'FTP_CRED', passwordVariable: 'FTP_PASSWORD', usernameVariable: 'FTP_USERNAME')]) {

                  sh 'ncftpput -R -v -u "FTP_USERNAME" -p "FTP_PASSWORD" flowersandtoys.ru / readme.txt'
                  }
            }
        }
    }
}