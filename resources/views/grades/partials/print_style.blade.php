* {
	box-sizing: border-box;
}

body {
	font-family: 'Arial';
	font-size: 10px;
}

.blank_space {
	height: 35px;
	width: 100%;
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
	padding-top: 10px;
}
.subheader .right p {
	margin: 0;
}

.subject-container {
	width: 100%;
	margin-top: 10px;
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

.comments {
	background: #c4c4c4;
	height: 11em;
	float: left;
	width: 100%;
	margin: 5px;
	padding: 10px;
}

.footer {
	background-color: #333;
	color: #fff;
}
.footer .left {
	width: 70%;
	font-size: 9px;
	padding: 10px;
	float: left;
}
.footer .right {
	padding-top: 10px;
	width: 20%;
	font-size: 9px;
	float: left;
}

.top-header {
	width: 85px;
	background: #fff500;
	font-size: 25px;
	padding: 5px;
	float: right;
}
.top-header p {
	margin: 5px;
}

.text-center {
	text-align: center;
}