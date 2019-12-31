## 為什麼我們需要 React？可以不用嗎？
React 有點像是 jQery，兩個都是讓寫程式更方便的 library，不過著重的層面不太一樣。不用 React 寫 javascript 當然也可以，React 只是提供了一套解決方法，讓我們在處理某些情況時比較快速，若不用 React 就自己想辦法處理就好，只是可能要花比較多心力。另外，React 是 facebook 開發拿來處理渲染問題的，但和 facebook 相比，我們處理的專案規模可能沒那麼大，因此未必能迅速地體會到 React 的方便之處

## React 的思考模式跟以前的思考模式有什麼不一樣？
這邊牽涉到的問題是：資料改變和頁面渲染如何維持同步。我們之前用過兩種方法，第一種方法是：將資料儲存起來，只要資料有任何變動，就將頁面全部重新渲染，但在資料量很大時，這作法會有效能上的疑慮。另一種方法是，不儲存資料，直接在頁面上進行改動。React 像是這兩種方法的折衷，React 會將資料儲存在 state 中，但在偵測到資料變更時，會先判定是哪一部份，然後進行部分的重新渲染，避免效能上的耗損

## state 跟 props 的差別在哪裡？
state 是 component 自己原生的資料，而 props 是從 parent 那邊得到的特性。以 component 的角度來看，前者是自己從零到有建造出來的，可以隨意改動；後者則是從別人那邊接收過來的，已經被固定好、無法改變。

## 請列出 React 的 lifecycle 以及其代表的意義
- Mounting
    - React 小書翻成掛載，是物件從零到有的產生過程，包含組件渲染、構造 DOM 元素、將元素塞入頁面
    - 整體的執行流程
        - constructor()：初始化工作
        - componentWillMount()
        - render()
        - componentDidMount()
- Updating
    - 更新物件內容
    - shouldComponentUpdate(object nextProps, object nextState)：控制物件是否重新渲染
    - componentDidUpdate(object prevProps, object prevState)：重新渲染並把更新變更到 DOM 之後使用
- Unmounting
    - 將物件清除，刪除前會使用 componentWillUnmount()
