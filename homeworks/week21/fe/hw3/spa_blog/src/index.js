import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import './index.css';

// 抓資料
const url = 'https://jsonplaceholder.typicode.com/posts'
let request = new XMLHttpRequest();
request.open('GET',url,false)
request.send()
const data = JSON.parse(request.responseText)

// 頂欄列
class NavBar extends Component {
    jump2random = () => {
        const {jumps} = this.props
        jumps('about',-1)
    }
    jump2Home = () => {
        const {jumps} = this.props
        jumps('home',-1)
    }
    render() {
        const {page} = this.props
        const where = page === 'home'
        return(
            <div className='navBar'>
                <span className='navBlog'>Blog</span>
                <span onClick={this.jump2Home} className={where ? 'navHome here':'navHome'}>Home</span>
                <span onClick={this.jump2random} className={where ? 'navAbout' : 'navAbout here'}>About</span>
            </div>
        )
    }
}

// 蓋頁面
class ListItem extends Component {
    click = () => {
        const {index,jump2single} = this.props
        jump2single(index)

    }
    render() {
        return(
            <div onClick={this.click} className='postTitle'>{this.props.value}</div>
        )
    }
}
class Content extends Component {
    jump2single = (a) => {
        const {jump} = this.props
        jump('single',a)
    }
    
    randonSentence = () => {
        const url = 'http://api.quotable.io/random'
        let request = new XMLHttpRequest();
        request.open('GET',url,false)
        request.send()
        let data = JSON.parse(request.responseText)
        return data
    }
    
    render(){
        const {viewer,location,archive} = this.props
        if (viewer === 'home'){
            const titleList = Object.values(archive).map(item=>item.title)
            const uniqueID = Object.values(archive).map(item=>item.id)
            return(
                <div className='homePage'>
                    <div className='title'>BlogPost</div>
                    <div className='postTitleList'>{titleList.map((item,index) => (
                        <ListItem index={index} key={uniqueID[index]} value={item} jump2single={this.jump2single}/>
                    ))}</div>
                </div>
            )
        } else if (viewer === 'single') {
            return (
                <div className='singlePost'>
                    <h2 className='singlePostTitle'>{archive[location].title}</h2>
                    <div className='postContent'>{archive[location].body}</div>
                </div>
            )
        } else if (viewer === 'about'){
            

            let data = this.randonSentence()
            let sentence = data.content
            let author = data.author
            return(
                <div className='quote'>
                    <div className='randomSentence'>{sentence}</div>
                    <div className='sentenceAuthor'>by {author}</div>
                </div>
            )
        }
    }
}
class Page extends Component {
    constructor(){
        super()
        this.state = {
            archive:data,
            viewer:'home',
            location:-1
        }
    }
    jump = (a,b) => {
        this.setState(state => {
            return {
                viewer:a,
                location:b,
                archive:state.archive
            }
        })
    }
    render(){
        return (
            <div>
            <NavBar jumps={this.jump} page={this.state.viewer}/>
            <div className='content'>
                <Content viewer={this.state.viewer} archive={this.state.archive}
                        jump={this.jump} location={this.state.location}/>
            </div>
            </div>
        )
    }
}
ReactDOM.render(<Page/>,document.querySelector('main'))

