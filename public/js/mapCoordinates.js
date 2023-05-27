async function getCoordinates(address) {
    const response = await fetch(`http://api.positionstack.com/v1/forward?access_key=007bf8de7770bc0930b7326c3a2efd8b&query=${address}`)
    const responseData = await response.json()
    const latitude = responseData.data[0].latitude;
    const longitude = responseData.data[0].longitude;
    console.log(latitude, longitude)
    console.log(responseData)
}

// getCoordinates("30-837 Kraków Aleksandry 27");