* {
	box-sizing: border-box;
}

body {
	font-family: 'Arial';
	font-size: 10px;
}

.subject-container {
	width: 100%;
	margin-top: 20px;
}

.subject-container .right {
	padding-left: 30px;
}
.subject-container .left {
	padding-right: 30px;
}
.subject-container td.row {
	padding-top: 15px;
}

table.subject {
}
table.subject td{
	border-right: 1px solid #000;
	border-bottom: 1px solid #000;
	font-weight: normal;
}
table.subject td:nth-child(1){
	border-left: 1px solid #000;
}
table.subject th {
	border-top: 1px solid #000;
	border-right: 1px solid #000;
	border-bottom: 1px solid #000;
	font-weight: normal;
	width: 40px;
}
table.subject th:nth-child(2) {
	border-left: 1px solid #000;
}
table.subject th.title {
	background-color: #f8eca0;
	font-weight: bold;
	border: none;
}

.header {
	background-color: #333;
	color: #fff;
	text-align: center;
	padding: 5px;
}
.header h2, .header h3 {
	margin: 0;
	font-weight: normal;
}
.header h1 {
	margin: 0;
}

.subheader {
	background-color: #f8eca0;
}
.subheader .left {
	width: 35%;
	text-align: center;
	padding: 10px;
	float: left;
}
.subheader .left .container {
	padding: 5px;
	border-right: 1px solid #000;
}
.subheader .left p, .subheader .left h3{
	margin: 0;
}

.subheader .right {
	width: 60%;
	text-align: left;
	float: left;
	padding: 5px;
}
.subheader .right p {
	margin: 0;
}

.wordbank {
	width: 40%;
	float: right;
}
.wordbank ul {
	list-style: none;
	padding: 0;
}
.wordbank ul li span {
	font-weight: bold;
}
.wordbank .float-left {
	width: 125px;
}
.float-left {
	float: left;
}