# import packages
import requests
import json

# define parameters
url = "https://api.sat.tausi.africa/v1/mpesa/upload_pdf"
headers = {"Authorization": "Bearer your_token"}
files = {
    'file': ('Miamala_2024_04_04.pdf', open('Miamala_2024_04_04.pdf', 'rb'), 'application/pdf')
}
data = {"fullname": "davis"}

# make the api call
response = requests.post(url, headers=headers, data=data, files=files)

# Check if the request was successful
if response.status_code == 200:
    # Parse the JSON response
    output_data = response.json()

    # Print the output
    print(output_data)
else:
    print("Error occurred:", response.text)
