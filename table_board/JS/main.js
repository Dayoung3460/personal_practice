

const main = document.getElementById("myMain");
const side = document.getElementById("mySidebar");

function toggleSidebar(){
    main.classList.toggle("collapseMain");
    side.classList.toggle("collapseSide");
}

const logIn = document.getElementById('id01');
const signUp = document.getElementById('signup');
const upLoad = document.getElementById('upload');
const write = document.getElementById('write');
const page = document.getElementById('pagination');
const write_upload = document.getElementById('write_upload');
const dPageTxt = document.getElementById('dPageTxt');

function openLogin(){
    logIn.style.display = 'block';
}

function closeLogin(){
    logIn.style.display = 'none';
}

function openSignup(){
    signUp.style.display = 'block';
}

function closeSignup(){
    signUp.style.display = 'none';
}


function openUploadImg(){
    upLoad.style.display = 'block';
	page.style.zIndex = '-1';
	dPageTxt.style.zIndex = '-1';
}

function closeUploadImg(){
    upLoad.style.display = 'none';
	page.style.zIndex = '0';
	dPageTxt.style.zIndex = '0';
}

function openWrite(){
	write.style.display = 'block'
}

function closeWrite(){
    write.style.display = 'none';
}




// ====================sign up / RegExp=======================


const signUpForm = document.getElementById('signUpForm');
const username = document.getElementById('username');
const email = document.getElementById('email');
const pw = document.getElementById('pw');
const pw2 = document.getElementById('pw2');

signUpForm.addEventListener('submit', e => {
	// e.preventDefault();
	
	checkInputs();
});

function checkInputs() {
	// trim to remove the whitespaces
	const usernameValue = username.value.trim();
	const emailValue = email.value.trim();
	const pwValue = pw.value.trim();
	const pw2Value = pw2.value.trim();
	
	if(usernameValue === '') {
		setErrorFor(username, 'Username cannot be blank');
	} else {
		setSuccessFor(username);
	}
	
	if(emailValue === '') {
		setErrorFor(email, 'Email cannot be blank');
	} else if (!isEmail(emailValue)) {
		setErrorFor(email, 'Not a valid email');
	} else {
		setSuccessFor(email);
	}
	
	if(pwValue === '') {
		setErrorFor(pw, 'Password cannot be blank');
	} else if(pwValue.length <= 6) {
		setErrorFor(pw, 'Password must be longer than 6 characters')
	} else if(pwValue.length >= 20) {
		setErrorFor(pw, 'Password must be less than 20 characters')
	} else if(pwValue === 'password') {
		setErrorFor(pw, 'Password cannot be password')
	} else {
		setSuccessFor(pw);
	}
	
	if(pw2Value === '') {
		setErrorFor(pw2, 'Password cannot be blank');
	} else if(pwValue !== pw2Value) {
		setErrorFor(pw2, 'Passwords does not match');
	} else{
		setSuccessFor(pw2);
    }
    
}

function setErrorFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form-control error';
	small.innerText = message;
}

function setSuccessFor(input) {
	const formControl = input.parentElement;
	formControl.className = 'form-control success';
}
	
function isEmail(email) {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

// ====================== Detail Page ====================

// const mainTop = document.querySelector(".main-top");
// const table = document.querySelector('table');
// const pagination = document.querySelector(".pagination");
// const detailPage = document.querySelector(".detailPage");

// function openContent(){
// 	mainTop.style.display = 'none';
// 	table.style.display = 'none';
// 	pagination.style.display = 'none';
// 	detailPage.style.display = 'block';
// }

// function backToList(){
// 	detailPage.style.display = 'none';
// 	mainTop.style.display = 'flex';
// 	table.style.display = 'inline-table';
// 	pagination.style.display = 'block';

// }




//*************************change profile pic *****************************




const uploadContainer = document.querySelector('.uploadContainer');
            const fileName = document.querySelector('.file-name');
            const openFileBtn = document.querySelector('.openFileBtn');
            const uploadClose = document.querySelector('.uploadClose');
            const uploadImg = document.querySelector('.uploadImg');

	        const write_imgcontainer = document.querySelector('.write_imgcontainer');
            const inputImg = document.querySelector('.inputImg');
            const write_uploadImg = document.querySelector('.write_uploadImg');

            let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;

            function chooseImg(){
                openFileBtn.click();
            }

            openFileBtn.addEventListener("change", function(){
                const file = this.files[0];

                if(file){
                const reader = new FileReader();

                reader.onload = function(){
                    const result = reader.result;
                    uploadImg.src = result;
                    uploadContainer.classList.add("active");
                }

                uploadClose.addEventListener("click", function(){
                    uploadImg.src = "";
                    uploadContainer.classList.remove("active");
                })

                reader.readAsDataURL(file);
                }

                if(this.value){
                let valueStore = this.value.match(regExp);
                fileName.textContent = valueStore;
                }
            }); 


            inputImg.addEventListener("change", function(){
                const file = this.files[0];

                if(file){
                const reader = new FileReader();

                reader.onload = function(){
                    const result = reader.result;
                    write_uploadImg.src = result;
                    write_imgcontainer.classList.add("active");
                }

                reader.readAsDataURL(file);
                }
            });