function formatDoc(cmd, value=null) {
	if(value) {
		document.execCommand(cmd, false, value);
	} else {
		document.execCommand(cmd);
	}
}



function addLink() {
	const url = prompt('Insert url');
	formatDoc('createLink', url);
}




const content = document.getElementById('content');

content.addEventListener('mouseenter', function () {
	const a = content.querySelectorAll('a');
	a.forEach(item=> {
		item.addEventListener('mouseenter', function () {
			content.setAttribute('contenteditable', false);
			item.target = '_blank';
		})
		item.addEventListener('mouseleave', function () {
			content.setAttribute('contenteditable', true);
		})
	})
})


const showCode = document.getElementById('show-code');
let active = false;

showCode.addEventListener('click', function () {
	console.log('clicked');
	showCode.dataset.active = !active;
	active = !active
	if(active) {
		content.textContent = content.innerHTML;
		content.setAttribute('contenteditable', false);
	} else {
		content.innerHTML = content.textContent;
		content.setAttribute('contenteditable', true);
	}
})

// Get the content div
const scontent = document.getElementById('content');

// Add a 'keydown' event listener to handle backspace key presses
scontent.addEventListener('keydown', function (event) {
    // If the backspace key was pressed and the div#content is empty or only contains whitespace, cancel the event
    if (event.key === 'Backspace' && (this.textContent.trim() === '')) {
        event.preventDefault();
    }
});




//Add an 'input' event listener to handle content changes
// document.getElementById('content').addEventListener('input', function () {
//     // Ensure that the inner content always starts with a <p> tag
//     if (!this.querySelector('p')) {
//         const newParagraph = document.createElement('p');
//         // this.innerHTML = '';
//         this.appendChild(newParagraph);
//     }
// });

// Add an 'input' event listener to handle content changes
// document.getElementById('content').addEventListener('input', function () {
//     // If the div#content is empty or doesn't contain a <p> tag, add a new <p> tag
//     if (this.innerHTML.trim() === '' || !this.querySelector('p')) {
//         this.innerHTML = '<p></p>';
//     }
// });

// Add an 'input' event listener to handle content changes
// document.getElementById('content').addEventListener('input', function () {
//     // If the div#content is empty or doesn't contain a <p> tag, add a new <p> tag
//     if (this.innerHTML === '' || !this.querySelector('p')) {
//         this.innerHTML = '<p></p>';
//     }
// });

// Add an 'input' event listener to handle content changes
// document.getElementById('content').addEventListener('input', function () {
//     // If the div#content doesn't contain a <p> tag, add a new <p> tag
//     if (!this.querySelector('p')) {
//         this.innerHTML = '<p>' + this.textContent + '</p>';
//     }
// });

// Function to ensure that the div#content always contains a <p> tag
// function ensureParagraph() {
//     var contentDiv = document.getElementById('content');
//     if (contentDiv.innerHTML.trim() === '' || !contentDiv.querySelector('p')) {
//         contentDiv.innerHTML = '<p></p>';
//     }
// }

// Add event listeners to handle content changes
// document.getElementById('content').addEventListener('input', ensureParagraph);
// document.getElementById('content').addEventListener('paste', ensureParagraph);
// document.getElementById('content').addEventListener('drop', ensureParagraph);




$('.save-button').click(function(e) {
    e.preventDefault(); // Prevent the default action of the link

    var content = document.querySelector('#content').innerHTML;
	var dateInputValue = document.querySelector('#dateInput').value;
	var date = new Date(dateInputValue);
	date.setMinutes(date.getMinutes() - date.getTimezoneOffset()); // Adjust for time zone difference
	var sqlDate = date.toISOString().split('T')[0];

    $.ajax({
        url: 'store_html.php',
        method: 'POST',
        data: { content: content,
				date: sqlDate // Send the date in SQL format
		},
        success: function(response) {
            console.log(response);
        }
    });
});




const filename = document.getElementById('filename');

function fileHandle(value) {
	if(value === 'new') {
		content.innerHTML = '';
		filename.value = 'untitled';
	} else if(value === 'txt') {
		const blob = new Blob([content.innerText])
		const url = URL.createObjectURL(blob)
		const link = document.createElement('a');
		link.href = url;
		link.download = `${filename.value}.txt`;
		link.click();
	} else if(value === 'pdf') {
		html2pdf(content).save(filename.value);
	}
}

$('.dropdown-item').click(function(){
    var selectedOption = $(this).text();
    $('#selectedOption').text('Selected option: ' + selectedOption);
});


// DATE
$( function() {
    $( "#dateInput" ).datepicker({
        dateFormat: "MM dd, yy"
    });

	// Set the initial value to the current date
    $( "#dateInput" ).datepicker("setDate", new Date());
} );

