const settings={
    api_host:'http://localhost:3000',
    socket_host:'http://localhost:3000',
    header_request:{
        Authorization: window.user.auth_token,
        Id:window.user.user_id
    }
}

export default settings;