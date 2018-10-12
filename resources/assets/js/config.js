const apiDomain = Laravel.apiDomain;
export const siteName = Laravel.siteName;

export const api = {
	login: apiDomain + '/authenticate',
	currentUser: apiDomain + '/user',
	updateUserProfile: apiDomain + '/user/profile/update',
	updateUserPassword: apiDomain + '/user/password/update',
    message: apiDomain + '/message',
    room_message: apiDomain + '/room_message',
    room: apiDomain + '/room'
};