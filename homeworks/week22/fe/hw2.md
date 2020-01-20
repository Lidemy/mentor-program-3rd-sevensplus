## React Router 背後的原理你猜是怎麼實作的？
### 個人想法
一開始沒有 React Router 時，是利用 state 的改變來判斷位置變動，進而影響畫面渲染。因此，我猜 React Router 背後使用了類似概念，不過原本 state 是記載在 component 內部，現在演變成直接記在網址列上。

### 資料整理
- Hash Router 是利用 `windows.addEventListener('hashchange', callback)` 來實現，這會在網址後面加上井字號，例如 `https://website.com/#idNumber`，不過，井字號之後的東西就像附註，實際上發送請求的位置只有 `https://website.com`。
- Browser Router 則是用 `windows.addEventListener('popstate',callback)` 來進行監聽，用 `windows.history` 進行控制，相關的 history 方法如下
    - `History.back()`：移動到上個網址
    - `History.forward()`：移動到下個網址
    - `History.go()`：移動到指定參數的網址，如前進兩次、後退三步
    - `History.pushState()`，這裡會接收三個參數：state, title, url
    - `History.replaceState()`：改變當前 History 的數據


## SDK 與 API 的差別是什麼？
> 維基百科：   
> SDK（軟體開發套件，Software Development Kit）一般是一些被軟體工程師用於為特定的軟體包、軟體框架、硬體平台、作業系統等建立應用軟體的開發工具的集合。   
> API（應用程式(編程)介面，Application Programming Interface）主要目的是讓應用程式開發人員得以呼叫一組常式功能，而無須考慮其底層的原始碼為何、或理解其內部工作機制的細節。API本身是抽象的，它僅定義了一個介面，而不涉及應用程式在實際實現過程中的具體操作。

簡單來說，輔助某個特定軟體的相關文件、工具都是 SDK。例如，若談論的對象是 Chrome，它的 SDK 就是各種擴充功能。

API 則是協助串接的工具，開發者先定義好一套架構，讓使用者不必知道背後的運作原理，就可以用這套規則進行操作。API 就像遙控器，我們可以直接拿遙控器轉台、調整音量大小、改變訊號源，但不用知道遙控器背後發出什麼訊號，才會讓電視的狀態改變。

SDK 下經常包含著 API，若把 SDK 想像成一個特定功能，API 是使用這套功能的說明書與操作工具。知乎的描述是：「有一杯密封飲料，它的名字叫做 SDK。飲料上插著吸管，吸管的名字叫 API。把你叫做『XX 系统』。如果你想喝到SDK裡的飲料（讓系统擁有 SDK 中的功能），你必須通過 API 這根吸管来實現（通過 API 連接你的系统和 SDK 工具包），否則你就喝不到飲料。所以：SDK = 放著你想要的軟件功能的軟件包，API = SDK 上唯一的接口。」


## 在用 Ajax 的時候，預設是不會把 Cookie 帶上的，要怎麼樣才能把 Cookie 一起帶上？
Ajax 會帶上同源的 cookie，但不同源的不會。我們可以在前段設定參數 `withCreditals = true`，後端設置 header 設定 `Access-Control-Allow-Credentials = true` 且 `Access-Control-Allow-Origin = request.getHeader('origin')`（Access-Control-Allow-Origin 不能為 *） 來帶上 cookie。
