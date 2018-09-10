

var player = {
    fullName : ["Mehboob Shaikh","Sohail Shaikh","Sameer Shaikh"],
    j_no	 		: [1,8,13],
    runs	 		: [5000,5500,1000],
    hlfCentury  	: [5,7,3],
    century  		: [5,6,2]/*,
    pastRuns		: [
    					[55,104,0,70,66],
    					[11,22,31,4,1],
    					[33,102,66,56,45]
    				]*/
};


function incCentury(j_no){
    	if(player.j_no.includes(j_no)){
        	var ind = player.j_no.indexOf(j_no);
            player.century[ind] = (player.century[ind]) + 1;
        }
        return player.century;
 }
 
 function incHalfCentury(j_no){
    	if(player.j_no.includes(j_no)){
        	var ind = player.j_no.indexOf(j_no);
            player.hlfCentury[ind] = (player.hlfCentury[ind]) + 1;
        }
        return player.hlfCentury;
 }
 
  function incRuns(j_no,run){
    	if(player.j_no.includes(j_no)){
        	var ind = player.j_no.indexOf(j_no);
            player.runs[ind] = (player.runs[ind]) + run;
	        return player.runs[ind];
        }
 }


$("#j_number").on('blur',function(){
	var enterJNo = parseInt($("#j_number").val());
	if(player.j_no.includes(enterJNo)){
    	var ind = player.j_no.indexOf(enterJNo);
    	$("#player_name").val(player.fullName[ind]);
    	$('#player_name').prop('readonly', true);
	}else{
    	$("#player_name").val('');
    	$('#player_name').prop('readonly', false);
    	$("#score").val('');
	}
});


function display(){
	var j_no = player.j_no;
	var names = player.fullName;
	var runs = player.runs;
	var hlfCentury = player.hlfCentury;
	var century = player.century;
	$('#clone-part').empty();
	for(var i = 0; i < names.length; i++){
		var output ='<div class="row"><div class="col"><div class="jersyno">'+ j_no[i] +'</div></div>';
		output += '<div class="col"><div class="name">'+ names[i] +'</div></div>';
		output += '<div class="col"><div class="runs">'+ runs[i] +'</div></div>';
		output += '<div class="col"><div class="hlfCentury">'+ hlfCentury[i] +'</div></div>';
		output += '<div class="col"><div class="century">'+ century[i] +'</div></div></div>';
		$(output).appendTo('#clone-part');
	}
}

function checkHalfCentury(checkrun){
	if(checkrun > 49 && checkrun < 100){
		return true;
	}else{
		return false;
	}
}
function checkFullCentury(checkrun){
	if(checkrun > 99){
		return true;
	}else{
		return false;
	}
}

$(document).ready(display());

$('#score').on('focus',function(){
	$('#submit_score').prop('disabled',false);
});

$("#submit_score").on('click',function(){
	var enterName = $("#player_name").val();
	var enterJNo = parseInt($("#j_number").val());
	var enterScore = parseInt($("#score").val());
	if(enterScore == 99){alert("Oops Better Luck Next Time");}

	if(!player.j_no.includes(enterJNo)){
		player.j_no.push(enterJNo);
		player.fullName.push(enterName);
		player.runs.push(enterScore);
		if(checkHalfCentury(enterScore)){
			player.hlfCentury.push(parseInt(1));
		}else{
			player.hlfCentury.push(parseInt(0));
		}

		if(checkFullCentury(enterScore)){
			player.century.push(parseInt(1));
		}else{
			player.century.push(parseInt(0));
		}
		display();
	}else{
		if(checkHalfCentury(enterScore)){incHalfCentury(enterJNo);}
		if(checkFullCentury(enterScore)){incCentury(enterJNo);}
    	incRuns(enterJNo,enterScore);
		display();
	}
});


	// console.log(enterName);
	// console.log(enterJNo);
	// console.log(enterScore);
	// var players = getPlayers();

	// if(!players.includes(enterJNo)){
		// getPlayers(enterJNo);
	// }
