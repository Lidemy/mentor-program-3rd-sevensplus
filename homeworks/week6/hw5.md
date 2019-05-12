## 請找出三個課程裡面沒提到的 HTML 標籤並一一說明作用。
- `<blockquote>`：標示引用的內容，可以在標籤內加上 `cite="url"` 的屬性。另外可以用 `<cite>` 來標示作者、出處，會以斜體呈現
- `<code>`：呈現一段程式碼
- `<video>`：嵌入影片，使用和 `<img>` 類似。可以用 `<source src="url" type="mp4">` 提供很多來源，避免瀏覽器不支援該格式
- `<detail>`：`<summary>` 是預設顯示的標題，`<p>` 是被隱藏的內容，按下 `summary` 就會被展開。也可以將預設改成 `open` 就會直接呈現內文
-`<embed>`：將外部資源嵌進來。屬性有`height、width、src、type`

參考：[MND列表](https://developer.mozilla.org/zh-CN/docs/Web/Guide/HTML/HTML5/HTML5_element_list)

## 請問什麼是盒模型（box modal）
- 在元素中，可以分成 `content、padding、border、margin` 四個部分，前三個加總起來就是元素呈現的樣子。一般預設中，這四個部分是分開計算的，指定 `width、height` 只會改變 `content` 部分的長寬，`padding、border` 會另外加上去。如果不想自己加加減減算長寬的話，可以設 `box-sizing:border-box`，就可以直接用 `width、height` 去指定物件大小，`content` 的長寬就會等於 `width - 2 * (padding + border)`

## 請問 display: inline, block 跟 inline-block 的差別是什麼？
- `block` ：每個元素自己佔據一行，調任意數值都可以，例子像是 `div、p、h1`。

- `inline` ：元素並排、呈現在同一行，調整時元素的上下位置不會更動，只會改變左右距離。調 `height` 對背景沒有影響，但是調 `padding` 會影響背景大小（但一樣不會動到上下的位置或其他元素）。例子有 `span、a`

- `inline-block`：結合前兩者，可以並排、也可以調高度

## 請問 position: static, relative, absolute 跟 fixed 的差別是什麼？
- `static`：預設值，~~雷打不動~~，什麼事都不會改變。這時候 `top、right、bottom、left、z-index` 指令無效

- `relative`：相對定位，根據原本應該出現的位子去做改變。
    - 舉例來說，若 a 原本被安排到 (10,10)，當 `position:relative`，這時候 (10,10) 就會變成新的原點，後續調整會依照新的原點去做改變。
    - 元素的改變不會影響到其他元素

- `absolute`：雖然直接翻譯是絕對定位，但我覺得比較像相對定位，相對於（參考點）定位。如果往上找有發現不是 `static` 的元素，就會根據那個元素定位；沒有的話，就會相對於 `body` 定位
    - 要相對於某元素定位時，通常會將那個元素設定成 `position:relative`
    - 當元素被設定成 `absolute` 時，就會被抽離出原本的排序方式，自成另一套體系
    - 奇怪的發現，top >>> bottom，left >>> right。如果同時指定 top 和 bottom ，不管哪一行先，只會服從 top 的指令；left 也優先於 right（但一般不會有人這樣用啦）

- `fixed`： viewport 絕對定位（瀏覽器定位）。物件會被固定在瀏覽器（viewport）的某個位子，不管頁面上下捲動都不會改變。

- 總結：`static` 是不能改變的預設值，`fixed` 是絕對定位，會被釘在瀏覽器某個地方。`relative` 是相對於原本的預設位置去改變，`absolute` 是相對於某個錨點改變（`body` 或 上層非預設值的元素）。
