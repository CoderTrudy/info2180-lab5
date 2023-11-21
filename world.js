document.addEventListener('DOMContentLoaded', function() {
    const lookupBtn = document.getElementById('lookup');
    const countryInput = document.getElementById('country');
    const resultDiv = document.getElementById('result');

    lookupBtn.addEventListener('click', function() {
        const country = countryInput.value.trim(); // Get the value from the country input

        if (country !== '') {
            const xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // If the request is successful, display the fetched data in the result div
                        resultDiv.innerHTML = xhr.responseText;
                    } else {
                        // If there's an error in fetching data, display an error message
                        resultDiv.innerHTML = 'Error fetching data';
                    }
                }
            };

            // Use the entered country name from the input field
            xhr.open('GET', 'world.php?country=' + encodeURIComponent(country), true);
            xhr.send();
        } else {
            // If the input is empty, prompt the user to enter a country name
            resultDiv.innerHTML = 'Please enter a country name';
        }
    });
});
