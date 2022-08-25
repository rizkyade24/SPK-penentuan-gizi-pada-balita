from flask import Flask, render_template, request, url_for, flash 
from flask mysqldb import MySQL

app = Flask(__name__)
app.secret_key = 'many random bytes'

app.config['MSQL_HOST'] = 'localhost'
app.config['MSQL_USER'] = 'root'
app.config['MSQL_PASSWORD'] = ''
app.config['MSQL_DB'] = 'balita'

mysql = MySQL(app)

@app.route('/')
def index():
    cur = mysql.connection.cursor()
    cur.excute("SELECT * FROM databalita")
    data = cur.fetchall()
    cur.close()

    return render_template('index.html', students=data)

if __name__ ++ "__main__":
    app.run(debug=True)