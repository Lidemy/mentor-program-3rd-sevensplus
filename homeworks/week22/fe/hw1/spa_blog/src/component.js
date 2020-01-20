import React from 'react';
import {HashRouter as Router, Link} from 'react-router-dom'

function homePage () {
    const url = 'https://qootest.com/posts'
    let request = new XMLHttpRequest();
    request.open('GET', url, false)
    request.send()
    const data = JSON.parse(request.responseText).filter(item => item.title !== '' && item.title !== undefined)    

    return (
        <Router>
            <div className='homePage'>
                <div className='postTitleList'>
                    {data.map(item => <Link to={'./' + item.id}>{titlebox(item)}</Link>)}
                </div>
            </div>
        </Router>
    )
}

function titlebox(item){
    return(
        <div className='postTitle' key={item.id}><img src={`https://source.unsplash.com/random/800x600/?sig=${item.id}`} height='180' width='240'/><div>{item.title}</div></div>
    )
}

function singlePage () {
    let num = window.location.hash.slice(2,)
    const url = `https://qootest.com/posts/${num}`
    let request = new XMLHttpRequest();
    request.open('GET',url,false)
    request.send()
    const data = JSON.parse(request.responseText)
    return (
        <div className='postWrap'>
            <div className='singlePost'>
                <div className='word'>
                    <h1 className='singlePostTitle'>{data.title}</h1>
                    <div className='postAuthor'>{data.author}</div>
                    <div className='postContent'>{data.body}</div>
                </div>
                <div>
                    <img src={`https://source.unsplash.com/random/600x800?sig=${data.id}`} height='400' width='300'/>
                </div>
            </div>
        </div>
    )
}

function aboutPage () {
    function randonSentence () {
        const url = 'http://api.quotable.io/random'
        let request = new XMLHttpRequest();
        request.open('GET', url, false)
        request.send()
        let data = JSON.parse(request.responseText)
        return data
    };
    
    let quote = randonSentence()
    return (
        <div className='quote'>
            <div className='randomSentence'>{quote.content}</div>
            <div className='sentenceAuthor'>by {quote.author}</div>
        </div>
    )
}

export { homePage, singlePage, aboutPage} ;