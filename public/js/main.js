var startTime;

document.addEventListener('DOMContentLoaded', function() {
startTime = performance.now();

// Get the value of the "redirect" parameter from the URL
   const urlParams = new URLSearchParams(window.location.search);
   const redirectParam = urlParams.get('redirect');

   // Check if the "redirect" parameter exists
   if (redirectParam == "histori") {
   document.getElementById('maindisplay1').style.display = 'none';
   document.getElementById('maindisplay2').style.display = 'contents';
   }
});


window.onload = function() {
      document.getElementById('loadingText').innerText = 'Downloading Content.';
      const EndTime = performance.now();
   
      setTimeout(function() {
      document.getElementById('loadingText').innerText = 'Please Wait.';
      loadListVoucher(function(check) {
      if(check) {
      getListVoucher();
      setTimeout(function() {
      if(document.getElementById('maindisplay1').style.display != 'none') {
      document.getElementById('maindisplay1').style.display = 'contents';
      }
      document.getElementById('loading').style.animation = 'loader 1s forwards';
         }, 5000);
      }
   else {
      window.location.reload;
   }
      });
      }, EndTime - startTime);
};

window.addEventListener('scroll', function() {
   const navbar = document.getElementById('navbar');
   const fnavbar = document.getElementById('fixedNavbar');
   const menu = document.getElementById('menu-ham');
   const fmenu = document.getElementById('fmenu-ham');
   const navbarRect = navbar.getBoundingClientRect();

   // Check if the bottom of the navbar is above the top of the viewport
   if (navbarRect.bottom < 0) {
      menu.style.display = 'none';
      fmenu.style.display = 'none';
      fnavbar.style.display = 'flex';
      fnavbar.style.position = 'fixed';
      fnavbar.style.zIndex = 998;
      fnavbar.style.top = 0;
      fnavbar.style.animation = 'heights 800ms';
   } else {
      menu.style.display = 'none';
      fmenu.style.display = 'none';
      fnavbar.style.display = 'none';
      fnavbar.style.position = null;
      fnavbar.style.zIndex = 0;
      fnavbar.style.top = 'auto';
   }
});

function loadListVoucher(callback) {
   // Retrieve data from localStorage
   let data = localStorage.getItem('storage_voucher');

   // Check if data exists in localStorage
   if (data) {
       // Make an AJAX request to your Laravel route
       $.ajax({
           url: '/', // Adjust the URL to match your Laravel route
           method: 'POST',
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           data: { myData: data },
           success: function(response) {
               console.log('Data sent to Laravel backend successfully');
               // Call the callback with true for success
               callback(true);
           },
           error: function(xhr, status, error) {
               console.error('Error sending data to Laravel backend:', error);
               // Call the callback with false for error
               callback(false);
           }
       });
   } else {
       // Data doesn't exist in localStorage, call the callback with false
       console.error('No data found in localStorage');
       callback(true);
   }
}

function generateRandomString(length) {
   const characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
   let result = '';
   for (let i = 0; i < length; i++) {
       result += characters.charAt(Math.floor(Math.random() * characters.length));
   }
   return result;
}

function makeVoucher(kategori, id) {
// Step 1: Retrieve data from localStorage
let storageData = localStorage.getItem('storage_voucher');

// Step 2: Parse JSON data into an array or initialize an empty array
let voucherArray = storageData ? JSON.parse(storageData) : [];

// Step 3: Find the highest "id" currently in use
let maxId = 0;
voucherArray.forEach(voucher => {
    if (voucher.id > maxId) {
        maxId = voucher.id;
    }
});

// Step 4: Add a new voucher with an incremented "id"
exvoucher.forEach(function(fir) {
   if(kategori == fir.kategori) {
      fir['list_voucher'].forEach(function(sec) {
         if(id == sec.id) {
let newVoucher = {
    id: maxId + 1, // Increment the "id"
    voucher: [{
        id_voucher: sec.id, // Change the voucher ID as needed
        kategori: fir.kategori,
        on_use: false,
        code: generateRandomString(15)
    }]
};
voucherArray.push(newVoucher);
            };
         });
      };
   });

// Step 5: Convert the array back to JSON
let updatedStorageData = JSON.stringify(voucherArray);

// Step 6: Store the updated JSON data back into localStorage
localStorage.setItem('storage_voucher', updatedStorageData);

}

function payVoucher(nama, id) {
   document.getElementById('loading').style.animation = 'unloader 200ms forwards';
   document.getElementById('loadingText').innerText = "Processing.";
   makeVoucher(nama, id);
   setTimeout(function() {
   document.getElementById('loadingText').innerText = "Reloading.";
   window.location = './?redirect=histori';
   }, 1000);
}

function showMenu() {

   const navbar = document.getElementById('navbar');
   const navbarRect = navbar.getBoundingClientRect();

   if(navbarRect.bottom > 0 && document.getElementById('menu-ham').style.display != "flex") {
document.getElementById('menu-ham').style.display = 'flex';
document.getElementById('menu-ham').style.animation = 'loadermenu 500ms forwards';
   }
   else if(document.getElementById('menu-ham').style.display == "flex" || document.getElementById('fmenu-ham').style.display == "flex") {
      document.getElementById('menu-ham').style.display = 'none';
      document.getElementById('fmenu-ham').style.display = 'none';
   }
   else {
      document.getElementById('fmenu-ham').style.display = 'flex';
      document.getElementById('fmenu-ham').style.animation = 'loadermenu 500ms forwards';
   }
}

function changePage(id) {
   if ((id == 1 && document.getElementById('maindisplay1').style.display !== "contents") ||
    (id == 2 && document.getElementById('maindisplay2').style.display !== "contents")) {
    document.getElementById('loading').style.animation = 'unloader 200ms forwards';
   document.getElementById('loadingText').innerText = "Switching Page.";
   }
   setTimeout(function() {
   if(id == 1 && document.getElementById('maindisplay1').style.display != "contents") {
      document.getElementById('loading').style.animation = 'loader 500ms forwards';
      document.getElementById('maindisplay1').style.display = 'contents';
      document.getElementById('maindisplay2').style.display = 'none';
   }
   else if(id == 2 && document.getElementById('maindisplay2').style.display != "contents") {
      document.getElementById('loading').style.animation = 'loader 500ms forwards';
      document.getElementById('maindisplay1').style.display = 'none';
      document.getElementById('maindisplay2').style.display = 'contents';
   }
   document.getElementById('loadingText').innerText = "Please Wait.";
   }, 500);
}

function handleVoucherUsage(userid, kategori, idv) {
   // Retrieve voucherArray from localStorage
   let voucherArray = localStorage.getItem('storage_voucher') == null ? [] : JSON.parse(localStorage.getItem('storage_voucher'));

   // Iterate over each object in the voucherArray
   for (let obj of voucherArray) {
       // Check if the object's id matches the userid
       if (obj.id === userid) {
           // Iterate over each voucher in the 'voucher' array of the current object
           for (let voucher of obj.voucher) {
               // Check if the 'id_voucher' matches the specific ID you want to update
               if (voucher.on_use === true) {
                   // Code for handling already used vouchers, if needed
                   alert('Code: ' + voucher.code);
               } else if (voucher.id_voucher === idv && voucher.kategori === kategori) {
                   // Update the 'on_use' attribute to true
                   voucher.on_use = true;
                   // Save the updated voucherArray back to localStorage
                   localStorage.setItem('storage_voucher', JSON.stringify(voucherArray));
                   // Display a success message
                   alert('Successful Uses.');
                   // Reload the page
                   window.location.reload();
                   // Exit the loop since the update has been made
                   return;
               }
           }
           // If the function reaches here, it means the voucher with the specified ID was not found
           return;
       }
   }
   // If the function reaches here, it means the user with the specified ID was not found
}

function getListVoucher() {
   // Example data
let storage_voucher = localStorage.getItem('storage_voucher') == null ? [] : JSON.parse(localStorage.getItem('storage_voucher'));

storage_voucher.forEach(lid => {
   lid.voucher.forEach(listv => {
exvoucher.forEach(dov => {
   dov.list_voucher.forEach(dos => {
               if (dos.id == listv.id_voucher && dov.kategori == listv.kategori) {
                  console.log('Loaded');
                   let pvDiv = document.createElement('div');
                   pvDiv.className = 'pv';

                   let pvCon1Div = document.createElement('div');
                   pvCon1Div.className = 'pv-con-1';

                   let img1 = document.createElement('img');
                   img1.src = "image/content/pat.png";
                   img1.setAttribute('loading', 'none');
                   img1.style.width = '30%';
                   pvCon1Div.appendChild(img1);

                   let img2 = document.createElement('img');
                   img2.src = "image/content/name.png";
                   img2.setAttribute('loading', 'none');
                   pvCon1Div.appendChild(img2);

                   let pvCon2Div = document.createElement('div');
                   pvCon2Div.className = 'pv-con-2';

                   let p1 = document.createElement('p');
                   p1.innerHTML = dos.title;
                   pvCon2Div.appendChild(p1);

                   let p2 = document.createElement('p');
                   p2.textContent = 'Berlaku Hingga: ' + dos.to + " | Kategori: " + dov.kategori;
                   pvCon2Div.appendChild(p2);

                   let pvCon3Div = document.createElement('div');
                   pvCon3Div.className = 'pv-con-3';

                   let button = document.createElement('button');
                   button.type = 'button';
                   button.id = 'hoveringButton';
                   if (listv.on_use) {
                       button.textContent = 'Used\n';
                       button.style.backgroundColor = 'gray';
                   } else {
                       button.textContent = 'Use';
                   }
                   button.addEventListener('click', function() {
                       // Call function to handle voucher usage
                       // Assuming you have a function to handle voucher usage
                       handleVoucherUsage(lid.id, dov.kategori, dos.id);
                   });
                   pvCon3Div.appendChild(button);

                   // Append elements to main div
                   pvDiv.appendChild(pvCon1Div);
                   pvDiv.appendChild(pvCon2Div);
                   pvDiv.appendChild(pvCon3Div);

                   // Append main div to promo-voucher container
                   document.getElementById('list-history-voucher').appendChild(pvDiv);
               }
            });
           });
       });
   });
}

function scrollToPosition(position) {
   window.scrollTo({
       top: position,
       behavior: 'smooth'
   });
}

const data = exvoucher;

function searchVoucher() {

    const searchTerm = document.getElementById('find').value.toLowerCase();
    const container = document.getElementById('containerSearch');
    container.innerHTML = ''; // Clear previous results

    if (!Array.isArray(data)) {
        console.error('Data is not an array.');
        return;
    }
    // Iterate over the data and filter based on the search term
    data.forEach(category => {
        if (!category.list_voucher || !Array.isArray(category.list_voucher)) {
            console.error('Invalid list_voucher array.');
            return;
        }

        category.list_voucher.forEach(voucher => {
            if (voucher.title.toLowerCase().includes(searchTerm) && searchTerm.length > 1) {
                const voucherDiv = document.createElement('div');
                voucherDiv.innerHTML = `<p>${voucher.title}</p>`; // Customize as needed                
               voucherDiv.setAttribute('onclick', 'beliVoucher("' + category.kategori + '", ' + voucher.id + ')'); 
                container.appendChild(voucherDiv);
                document.getElementById('listSearch').style.display = 'flex';
            }
            else {
                document.getElementById('listSearch').style.display = 'none';
            }
        });
    });
}