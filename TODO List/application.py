
from flask import Flask, render_template, request

app = Flask(__name__)

tasks = []

@app.route('/', methods=['GET', 'POST'])
def todo_list():
    if request.method == 'POST':
        task = request.form['task']
        tasks.append(task)
    return render_template('index.html', tasks=tasks)

@app.route('/delete', methods=['POST'])
def delete_task():
    task = request.form['task']
    if task in tasks:
        tasks.remove(task)
    return render_template('index.html', tasks=tasks)

if __name__ == '__main__':
    app.run(debug=True)
