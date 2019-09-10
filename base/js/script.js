var pageClub = 0;
var onVoteClubsExpandNumber = 1;

function getPageClub(id) {
	$('#v-pills-clubs').html('<img src="https://bde-epsi.tc-fr.tk/base/img/loader.gif" />');
	jQuery.ajax({
		url: "https://bde-epsi.tc-fr.tk/membre/page_club.php",
		data:'id='+id,
		type: "POST",
		success:function(data){$('#v-pills-clubs').html(data);}
	});
	pageClub = 1;
	setActivePage("clubs");
}

function getPageClubs() {
	if (pageClub == 1) {
		$('#v-pills-clubs').html('<img src="https://bde-epsi.tc-fr.tk/base/img/loader.gif" />');
		jQuery.ajax({
			url: "https://bde-epsi.tc-fr.tk/membre/clubs.php",
			success:function(data){$('#v-pills-clubs').html(data);}
		});
	}
	pageClub = 0;
	setTimeout(function(){
		getClubs(1, 10, "createdClubs", 0);
		getClubs(0, 10, "onVoteClubs", 1);
	}, 250);
}

function getClubs(statut, number, divId, order) {
	$('#'+divId).html('<img src="https://bde-epsi.tc-fr.tk/base/img/loader.gif" />');
	jQuery.ajax({
		url: "https://bde-epsi.tc-fr.tk/api/",
		data:'&request=getClubs'+'&arg1='+statut+'&arg2='+number+'&arg3='+divId+'&arg4='+order,
		type: "POST",
		success:function(data){$('#'+divId).html(data);}
	});
}

function getMyClubs() {
	$('#myClubsDashboard').html('<img src="https://bde-epsi.tc-fr.tk/base/img/loader.gif" />');
	jQuery.ajax({
		url: "https://bde-epsi.tc-fr.tk/api/",
		data:'&request=getMyClubs',
		type: "POST",
		success:function(data){$('#myClubsDashboard').html(data);}
	});
}

function expandClubsDashboard() {
	onVoteClubsExpandNumber = onVoteClubsExpandNumber + 1;
	$('#onVoteClubsDashboard').html('<img src="https://bde-epsi.tc-fr.tk/base/img/loader.gif" />');
	getClubs(0, onVoteClubsExpandNumber, "onVoteClubsDashboard", 1);
}

function resizeNavBar() {
  $('.nav-bar').toggleClass('nav-bar-resized');
  $('.nav-bar-text').toggleClass('nav-bar-text-resized');
  $('.fa-nav').toggleClass('fa-nav-resized');
  $('.fa-resizer').toggleClass('fa-resizer-resized');
  $('.nav-link').toggleClass('nav-link-resized text-center');
  $('.nav-img').toggleClass('nav-img-resized');
  $('.page-content').toggleClass('page-content-resized');
}

function setActivePage(page) {
	$('.nav-link').removeClass('active show');
	$('.tab-pane').removeClass('active show');
	$('#v-pills-'+page+'-tab').addClass('active show');
	$('#v-pills-'+page).addClass('active show');
}

function createClub() {
	$('#clubCreationRequest').html('<img width="50px" height="50px" src="https://bde-epsi.tc-fr.tk/base/img/loader.gif" />');
	jQuery.ajax({
		url: "https://bde-epsi.tc-fr.tk/api/",
		data:'&request=createClub'+'&arg1='+document.getElementById("clubName").value+'&arg2='+document.getElementById("clubDesc").value+'&arg3='+document.getElementById("clubAnonyme").checked,
		type: "POST",
		success:function(data){
			$('#clubCreationRequest').html(data);
			expandClubsDashboard();
			getClubs(0, 10, "onVoteClubs", 1);
		}
	});
}

function editClub(id) {
	$('#clubModificationRequest').html('<img width="50px" height="50px" src="https://bde-epsi.tc-fr.tk/base/img/loader.gif" />');
	jQuery.ajax({
		url: "https://bde-epsi.tc-fr.tk/api/",
		data:'&request=editClub'+'&arg1='+id+'&arg2='+document.getElementById("clubNameEdit").value+'&arg3='+document.getElementById("clubDescEdit").value+'&arg4='+document.getElementById("clubAnonymeEdit").checked,
		type: "POST",
		success:function(data){
			setTimeout(function(){
				getPageClub(id);
			}, 500);
		}
	});
}

function deleteClub(id, action) {
	$('#deleteButton').toggle();
	$('#deleteButton1').toggle();
	$('#deleteButton2').toggle();
	if (action==1) {
		jQuery.ajax({
			url: "https://bde-epsi.tc-fr.tk/api/",
			data:'&request=deleteClub'+'&arg1='+id,
			type: "POST",
			success:function(data){
				setTimeout(function(){
					getPageClubs();
				}, 500);
			}
		});
	}
}

function vote(type, idClub, idMember, statut) {
	$('#voteClub-'+idClub).html('<img width="25px" height="25px" src="https://bde-epsi.tc-fr.tk/base/img/loader.gif" />');
	$('#voteClubDashboard-'+idClub).html('<img width="25px" height="25px" src="https://bde-epsi.tc-fr.tk/base/img/loader.gif" />');
	jQuery.ajax({
		url: "https://bde-epsi.tc-fr.tk/api/",
		data:'&request=voteClub'+'&arg1='+type+'&arg2='+idClub+'&arg3='+idMember+"&arg4="+statut,
		type: "POST",
		success:function(data){
			$('#voteClub-'+idClub).html(data);
			$('#voteClubDashboard-'+idClub).html(data);
			getClubProgressBar(idClub);
		}
	});
}

function adhesion(type, idClub, idMember) {
	jQuery.ajax({
		url: "https://bde-epsi.tc-fr.tk/api/",
		data:'&request=adhesion'+'&arg1='+type+'&arg2='+idClub+'&arg3='+idMember,
		type: "POST",
		success:function(data){
			getPageClub(idClub);
		}
	});
}

function getClubProgressBar(idClub) {
	$('#progressBar-voteClub-'+idClub).html('<img width="20px" height="20px" src="https://bde-epsi.tc-fr.tk/base/img/loader.gif" />');
	$('#progressBar-voteClubDashboard-'+idClub).html('<img width="20px" height="20px" src="https://bde-epsi.tc-fr.tk/base/img/loader.gif" />');
	jQuery.ajax({
		url: "https://bde-epsi.tc-fr.tk/api/",
		data:'&request=getClubProgressBar'+'&arg1='+idClub,
		type: "POST",
		success:function(data){
			$('#progressBar-voteClub-'+idClub).html(data);
			$('#progressBar-voteClubDashboard-'+idClub).html(data);
		}
	});
}

function pageLoad() {
	getClubs(1, 5, "clubsDashboard", 0);
	getClubs(0, 1, "onVoteClubsDashboard", 1);
	getMyClubs();
}
