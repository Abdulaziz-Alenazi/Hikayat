from ibm_cloud_sdk_core.authenticators import IAMAuthenticator
from ibm_watson import IAMTokenManager

def generate_token():
    authenticator = IAMAuthenticator('myapikey')

    token_manager = IAMTokenManager(apikey='Wqyvwg92GTvbhtpQtxPl_41uIakrE6kDpueiN1Rq6Y3Y')

    access_token = token_manager.get_token()

    print(access_token)
    return access_token
generate_token()
