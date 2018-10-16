var quickAddButton = document.querySelector("#quick-add-button");
var ajaxurl = myData.ajaxurl;
var postTitle = document.querySelector('.restapi-fields [name="title"]').value;

if (quickAddButton) {
	quickAddButton.addEventListener("click", function() {
	    var postData = {
	      "title": document.querySelector('.restapi-fields [name="title"]').value,
	      "content": document.querySelector('.restapi-fields [name="content"]').value,
	      "fields" : {
	      	"user_name" : "Smarty"
	      },
	      "status": "publish"
	    }

	     jQuery.ajax({
	        method: "POST",
	        url: ajaxurl,
	        data: {
	            action: 'checkPost',
	            postTitle: postTitle
	        },
	        success: function(res){
	        	res = JSON.parse(res);
		        if(res['status'] == 0) {
		        	createPostMethod();
		        }else {
		        	// console.log(res['id']);
		        	postData.content = res['content'] + "\n" + postData.content;
		        	// deletePostMethod(res['id']);
		        	// createPostMethod();
		        	updatePostMethod(res['id']);
		        }
	        }
	    });

		function createPostMethod(){

			fetch(myData.siteURL+"/index.php/wp-json/wp/v2/result",{
			    method: "POST",
			    headers:{
			        'Content-Type': 'application/json;charset=UTF-8',
			        'accept': 'application/json',
			        'X-WP-Nonce': myData.nonce
			    },
			    body:JSON.stringify({
			        title: postData.title,
			        content: postData.content,
			        fields: {
			        	user_name: postData.fields.user_name
			        },
			        status: 'publish'
			    })
			}).then(function(){
	        	document.querySelector('.restapi-fields [name="content"]').value = '';
			});


		    // var createPost = new XMLHttpRequest();
		    // createPost.open("POST", myData.siteURL + "/index.php/wp-json/wp/v2/result");
		    // createPost.setRequestHeader("X-WP-Nonce", myData.nonce);
		    // createPost.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
		    // createPost.send(JSON.stringify(postData));
		    // createPost.onreadystatechange = function() {
		    //   if (createPost.readyState == 4) {
		    //     if (createPost.status == 201) {
		    //       // document.querySelector('.restapi-fields [name="title"]').value = '';
		    //       document.querySelector('.restapi-fields [name="content"]').value = '';
		    //     } else {
		    //       alert("Error");
		    //     }
		    //   }
		    // }
		}
		function updatePostMethod(id){
			fetch(myData.siteURL+'/index.php/wp-json/wp/v2/result/'+id,{
			    method: "PUT",
			    headers:{
			        'Content-Type': 'application/json;charset=UTF-8',
			        'accept': 'application/json',
			        'X-WP-Nonce': myData.nonce
			    },
			    body:JSON.stringify({
			        title: postData.title,
			        content: postData.content,
			        fields: {
			        	user_name: postData.fields.user_name
			        },
			        status: 'publish'
			    })
			}).then(function(){
	        	document.querySelector('.restapi-fields [name="content"]').value = '';
			});
		}
		function deletePostMethod(id){
			// console.log(id);
			fetch(myData.siteURL+'/index.php/wp-json/wp/v2/result/'+id+'?force=true',{
			    method: "DELETE",
			    headers:{
			        'Content-Type': 'application/json;charset=UTF-8',
			        'accept': 'application/json',
			        'X-WP-Nonce': myData.nonce
			    }
			});
		}
  });
}