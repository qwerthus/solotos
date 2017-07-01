from flask import Flask, render_template, request, redirect, url_for, session
import sqlite3 as sql

app = Flask(__name__)
app.secret_key = 'supersecretkey'

@app.route('/')
def main():
   con = sql.connect("hotel")
   con.row_factory = sql.Row
   cur = con.cursor()
   cur.execute("SELECT * FROM hotels")
   rows = cur.fetchall()
   return render_template('main.php',rows=rows)

@app.route('/login')
def login():
 con = sql.connect("hotel")
 con.row_factory = sql.Row
 cur = con.cursor()
 
 cur.execute("SELECT * FROM hotels") 
 rows = cur.fetchall()
 
 return render_template('login.php',rows=rows)


@app.route('/check', methods=['POST'])
def check():
 con = sql.connect("hotel")
 con.row_factory = sql.Row
 cur = con.cursor()

 email = request.form['postEmail']
 pw = request.form['postPassword']

 cur.execute("SELECT COUNT(*) FROM USERS WHERE EMAIL = ? AND PASSWORD = ?",[email,pw])
 rows = cur.fetchone()

 if rows[0] > 0: 
 	session['mail'] = email
 	cur.execute("SELECT * FROM USERS WHERE EMAIL = ? AND PASSWORD = ?",[email,pw])
 	getId = cur.fetchone()[0]
 	session['id'] = getId
 	return redirect(url_for('main'))
 else:
 	return render_template('login.php')

@app.route('/register')
def register():
	return render_template('register.php')

@app.route('/add_hotel')
def add_hotel():
	return render_template('add.php')

@app.route('/logout')
def logout():
 session.pop('mail', None)
 session.pop('id', None)
 return redirect(url_for('main'))

@app.route('/view_booking')
def view_booking():
 con = sql.connect("hotel")
 con.row_factory = sql.Row
 cur = con.cursor()
 cur.execute("SELECT * FROM BOOKINGS JOIN HOTELS ON bookings.hotelID = hotels.hotelID WHERE bookings.userId=?",[session['id']])
 rows = cur.fetchall()
 return render_template('bookings.php',rows=rows)
 
@app.route('/view_hotel/<id>')
def view_hotel(id):
 con = sql.connect("hotel")
 con.row_factory = sql.Row
 cur = con.cursor()
 cur.execute("SELECT * FROM HOTELS WHERE hotelId=?",id)
 row = cur.fetchone()
 return render_template('detail.php',row=row)

@app.route('/add_booking/<hotelId>')
def add_booking(hotelId):
 con = sql.connect("hotel")
 con.row_factory = sql.Row
 cur = con.cursor()
 cur.execute("INSERT INTO BOOKINGS (hotelId,userId) VALUES (?,?)",[hotelId,session['id']])
 con.commit()
 return redirect(url_for('main'))

@app.route('/register_acc', methods =['POST'])
def register_acc():
 con = sql.connect("hotel")
 con.row_factory = sql.Row
 cur = con.cursor()

 email = request.form['postEmail']
 pw = request.form['postPassword']
 
 cur.execute("INSERT INTO USERS (email,password) VALUES (?,?)",[email,pw])
 con.commit()
 return redirect(url_for('main'))

@app.route('/add_hotel_success', methods =['POST'])
def add_hotel_success():
 con = sql.connect("hotel")
 con.row_factory = sql.Row
 cur = con.cursor()

 name = request.form['postName']
 desc = request.form['postDescription']
 img = request.form['postImageUrl']
 star = request.form['postStar']
 prc = request.form['postPrice']
 
 cur.execute("INSERT INTO HOTELS (name,description,imageUrl,star,price) VALUES (?,?,?,?,?)",[name,desc,img,star,prc])
 con.commit()
 return redirect(url_for('main'))

@app.route('/delete_booking/<bookingId>')
def delete_booking(bookingId):
 con = sql.connect("hotel")
 con.row_factory = sql.Row
 cur = con.cursor()

 cur.execute("DELETE FROM BOOKINGS WHERE bookingId = ?",[bookingId])
 con.commit()
 return redirect(url_for('main'))


if __name__ == '__main__':
 app.debug = True
 app.run('0.0.0.0',5096)