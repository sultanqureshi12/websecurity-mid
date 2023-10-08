
  // const messageForm = document.getElementById('message-form');

// console.log({messageForm})
console.log(ajax_object.url);

document.getElementById('submit-btn').addEventListener('click',submit_data);

function submit_data(e){
  e.preventDefault();

  // alert('hello');

  let form=document.getElementById('message-form');

  let username= form.elements.username.value;
  let email = form.elements.email.value;
  let msg = form.elements.message.value;

  var formData = new FormData();
  formData.append('username',username);
  formData.append('email',email);
  formData.append('msg',msg);

  // console.log(formData);

  const url = `${ajax_object.url}?action=send_message_form`;

  fetch(url,{
    method:'POST',
    body : formData 
  })
  .then(response=>response.json())
  .then(response=>{
    console.log(response);
  })

}

// if (messageForm) {

//   messageForm.addEventListener('submit', (e) => {
//     e.preventDefault();

//     fetch(ajax_object.ajax_url, {
//       method: 'POST',
//       headers: {
//         'Content-Type': 'application/x-www-form-urlencoded'
//       },
//       body: new URLSearchParams(new FormData(messageForm))
//     }).then(response => {

//       return response.json();

//     }).then(jsonResponse => {

//       console.log({jsonResponse});

//     });

//   });
// }
