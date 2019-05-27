const admin = require('firebase-admin')
const { google } = require('googleapis')
const axios = require('axios')

const MESSAGING_SCOPE = 'https://www.googleapis.com/auth/firebase.messaging'
const SCOPES = [MESSAGING_SCOPE]

const serviceAccount = require('./web-api-a4406-firebase-adminsdk-j6onp-9237647e5e.json')
const databaseURL = 'https://web-api-a4406.firebaseio.com'
const URL =
    'https://fcm.googleapis.com/v1/projects/web-api-a4406/messages:send'
const deviceToken =
    'cjMrU4keHEI:APA91bG3b4mKXn_BTmkpUsKl1ScR2Fl4IpkmKJvLF9lafzuMXasJKM79RPBOYW-DF-rDFu8GwVGg0PPVqH1sEFpEb7IrNajOiNGrT2W-zM3tiMfXJBHn__YxfILV24oQuO-O-W8AVIB0'

admin.initializeApp({
    credential: admin.credential.cert(serviceAccount),
    databaseURL: databaseURL
})

function getAccessToken() {
    return new Promise(function(resolve, reject) {
        var key = serviceAccount
        var jwtClient = new google.auth.JWT(
            key.client_email,
            null,
            key.private_key,
            SCOPES,
            null
        )
        jwtClient.authorize(function(err, tokens) {
            if (err) {
                reject(err)
                return
            }
            resolve(tokens.access_token)
        })
    })
}

async function init() {
    const body = {
        message: {
            data: { key: 'value' },
            notification: {
                title: 'Notification title',
                body: 'Notification body'
            },
            webpush: {
                headers: {
                    Urgency: 'high'
                },
                notification: {
                    requireInteraction: 'true'
                }
            },
            token: deviceToken
        }
    }

    try {
        const accessToken = await getAccessToken()
        console.log('accessToken: ', accessToken)
        const { data } = await axios.post(URL, JSON.stringify(body), {
            headers: {
                'Content-Type': 'application/json',
                Authorization: `Bearer ${accessToken}`
            }
        })
        console.log('name: ', data.name)
    } catch (err) {
        console.log('err: ', err.message)
    }
}

init()