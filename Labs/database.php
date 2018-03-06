CRUD

Create
REad
Update
Destroy

database system: MySQL
Postgresql, Sqlite
Structured query language called SQL
relational databses 
relational dbs function like a set of spreadsheets (many tables)
db can have multiple tables; one db per website should work...

rows in a table is a record
columns are attributes

every table should have an id column (number) so that each has a unique id

u can use tables to describe types of things, which can be related to other tables, and those values carry over... (i.e. example of program to refer to which program... this could be served from a dropdown...)

every column has data type (look up MySQL data types. they are specialized)
text - this means text of unlimited length; string has length

db = designed to handle millions of rows, and accessed by different people at the same time

mamp comes with MySQL; this is database server
Apache is for the webserver...

for filtering results from sql, look into join...


1. define table structure

Database: calendar
	Table: events
		id: integer (auto-increment)
		title: string - MySQL calls this VARCHAR(255); 255 refers to max. length
		date: date
		time: time
		description: text

2. add some records using PHPMyAdmin

3. make an index page

4. make a single record view page if you want - is this necessary? HOw does it transform the data?d

5. create/update pages if you want one
what affordances do they have? What do they encourage? Is it primary use? 

