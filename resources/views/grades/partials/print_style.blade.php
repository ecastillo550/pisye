<style>
* {
	box-sizing: border-box;
}

body {
	font-family: 'newjune';
	font-size: 9px;
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
.header .container {
	width: 400px;
	margin: 0 auto;
}
.header h2, .header h3 {
	margin: 0;
	font-weight: normal;
	font-size: 9.8vw;
}
.header h3 {
	font-size: 8.1vw;
}
.header h1 {
	margin: 0;
	font-size: 15vw;
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
	margin-top: 0px;
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
	height: 2em;
	width: 200px;
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

.left-wordbank {
	width: 50%;
	float: left;
	padding-left: 2px;
}
.left-wordbank ul {
	list-style: none;
	padding: 0;
}
.left-wordbank ul li span {
	font-weight: bold;
}
.left-wordbank .float-left {
	width: 300px;
}

.comments {
	background: #c4c4c4;
	height: 10em;
	float: left;
	width: 100%;
	padding: 10px;
}

.footer {
	background-color: #333;
	color: #fff;
}
.footer .left {
	width: 70%;
	font-size: 9px;
	padding-top: 5px;
	padding-left: 10px;
	float: left;
}
.footer .right {
	padding-top: 10px;
	width: 25%;
	font-size: 9px;
	float: left;
	padding-bottom: 10px;
	text-align: right;
}

.top-header {
	width: 100px;
	float: right;
}
.top-header p {
	margin: 5px;
}

.text-center {
	text-align: center;
}
</style>