<style>
 	body{
 		color: 	#4E4E4E;
 	}
	h1{
		font-size: 36px;
	}
	h2{
		padding-bottom: 30px;
	}

	h3{
		margin-top: 10px;
	}

	a{
		color: #21388A;
	}

	footer{
		margin-top: 140px;
	}

	.content>div{
		padding: 50px 0;
	}

	nav{
		margin-bottom: -20px;
	}
	header{
		margin-top: -10px;
	}

	footer{
		border-top: 1px solid #f3f3f3;

		margin-bottom: 80px;
	}
	.footercolumn{
		/*border-top: 1px solid #f3f3f3;*/
		border-right: 1px solid #f3f3f3;
		padding-top: 15px;
		padding-left: 15px;

	}

	.footercolumn-right{
		border-right-style: hidden;
	}

	.footer-form{
		padding-left: 0
	}

	.right{
		float:right;
	}

	.twitter, .facebook, .googleplus, .youtube{
		background-image: url('/img/free-flat-social-icons.png');
			background-repeat: no-repeat;
			height: 44px;
		width: 44px;
		float: left;
		background-size: 462px 344px; 

	}

	.twitter{
		background-position: 0 0;
	}

	.facebook{
		background-position: -52px 0;
	}

	.googleplus{
		background-position: -104px -52px;
	}

	.youtube{
		background-position: -210px 0;
	}


	.grey{
		background-color: #f3f3f3;
	}

	.center{
		text-align: center;
	}

	.carousel-inner{
		max-height: 850px;
		overflow: hidden;
		position: relative;
	}

	.carousel-inner .item{
		position: relative;
		max-height: 850px;
	}

	.carousel-inner img{
		width: 100%;
	}

	.carousel-caption{
		background-color: rgb(6, 25, 111);
		opacity: 0.8;
		padding: 15px;
		bottom: 100px;
		text-align: left;
	}

	.box{
		border: 1px solid #f3f3f3;
		padding: 20px;
	}

	.bid{
		margin-left: -20px;
		margin-right: -20px;
		padding: 5px 15px; 
		background-color: rgb(1, 166, 160);
	}

	.bid>.row{
		padding: 5px;
	}

	.border-right{
		border-right: 1px solid #f3f3f3;
	}

	table{
		width: 100%;
		table-layout: fixed;
	}

	table, th, td{
		border: 1px solid black;
		border-collapse: collapse;
	}

	th, td {
		padding: 5px;
		text-align: left;
	}

	.navbar-header{
		position: absolute;
		top: -15px;
		/*z-index: 16;*/
	}

	.navbar-top{
		list-style-type: none;
		margin-left: -40px;
		margin-top: 15px;

	}

	.navbar-top li{
		margin-left: 20px;
		margin-right: 20px;
	}

	.navbar-top li:first-of-type{
		margin-left: 0;
	}

	.navbar-top form, .navbar-top form li{
		float: left;
	}

	.navbar a{
		font-weight: 700;
		color:#4E4E4E;
	}

	.navbar-top a{
		color: #21388A;
	}

	.btn-no{
		border: none;
		background-color: transparent;
	}

	.navbar-form
	{
		/*margin-right: 0;*/
		padding-right: 0; 
	}

	.form-login{
		margin-top: -5px;
	}



	.vertical-divider {
		border-right: 1px solid #f3f3f3;
	}

	.list-inline li{
		border-right: 1px solid #aaa;
	}

	.list-inline li:first-child, .list-inline li:last-child{
		border-style: none;
	}

	.content img{
		max-width: 100%;
	}

	.hidden{
		visibility: hidden;
	}

	.auction-preview{
		margin-bottom: 10px;
		margin-top: 15px;

	}
	.small-right .auction-preview{
		margin-top: 0;
		padding-bottom: 
	}

	.auction-preview hr{
		margin:0;
	}

	.auction-details .artist{
		color: #21388A;
	}

	.auction-details .title, .auction-details .highest-bid{
		font-size: 1.2em;
	}

	.auction-details .title{
		font-weight: 600;
	}

	.auction-visit{
		overflow: hidden;
		border-bottom: 1px solid #CCC;
	}

	.btn-visit{
		float:right;
		/*display: inline;*/
		font-size: 1.2em;
		text-transform: uppercase;
		/*background-color: #F5F5F5;*/
		color: #21388A;
		border-radius: 0;
		border-bottom: none;
	}

	.big-left{
		position: relative;
		height: 550px;
		overflow:hidden;
	}

	.big-left img{
		position:relative;
		height: 550px;
		max-width: none;
		opacity: 0.5;
	}
	.big-left .auction-details-first{
		position: absolute;
		bottom: 100px;
		left: 30px;
		font-size: 3em;
	}
	.order-list{
		float: left;
	}

	/*art detail*/
	.sub-image, .header-image{
		border: 3px solid #535353;
	}

	.sub-image{
		margin-top: 20px;
		opacity: .3;
	}

	.sub-image:hover{
		cursor: pointer;
	}

	.sub-image.active{
		opacity: 1;
	}

	form .fileupload .bootstrap-filestyle {
	  width: 100%;
	}

	form .fileupload .btn-default {
	  display: block;
	  width: 100%;
	  height: 62px;
	  padding: 10px 20px;
	  background-color: #686868;
	  color: white;
	  text-transform: uppercase;
	  text-align: center;
	  border-radius: 0;
	  border: 1px solid #4e4e4e;
	}
	.home-small-img, .home-big-img{
		position: relative;
		text-align: center;
	}
	.home-small-img img{
		max-height: 175px;
	}
	.home-big-img img{
		max-height: 356px;
	}

	.home-small-img  .magnifier, .home-big-img  .magnifier{
		position: absolute;
		left: 45%;
		top: 40%;
		visibility: hidden;
		color:white;
		font-size: 50px;
	}

	.home-big-img .magnifier{
		font-size: 75px;
	}
	.home-small-img:hover .magnifier, .home-big-img:hover .magnifier{
		visibility: visible;
	}

	table tr th{
		text-align: center;
		background-color: #CCC;
		border: none;
	}

	.right-column{
		text-align: right;
	}

	.right-column .box input{
		font-size: 20px;
		padding: 10px;
	}



	.bid input[type='text']{
		max-width: 100%;
	}
	.bid input[type="submit"]{
		background-color: transparent;
		border-style: hidden;
		color:white;
		text-align: left;
	}

	.info p{
		margin-top: 0;
		margin-bottom: 0;
	}
	.estimate{
		font-size: 1.5em;
		color: #211582;
	}

	.info .estimate-numbers{
		font-size: 3em;
	}

	.buyNow{
		color: rgb(1, 166, 160);
		text-decoration: underline;
	}
	.buyNow:hover{
		color: #211582;
	}

	.question{
		/*margin: 20px auto;*/
		/*width: 200px;*/
		text-transform: uppercase;
		color:white;
		text-align: center;
		font-size: 2em;
	}

	.question div{
		width: 100%;
		background-color: green;
		padding: 20px;
		margin: 20px auto;
	}

	.pagination, .pagination li a, .pagination li span{
		border: none;
		color: #4E4E4E;
	}

	.pagination a, .pagination span{
	}

	.pagination > li.active > span{
		background-color: transparent;
		border: none;
		color: #4E4E4E;
		font-weight: 800;
	}


</style>