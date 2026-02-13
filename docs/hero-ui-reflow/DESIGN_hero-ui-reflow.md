## 架构设计
```mermaid
graph TD
  A[首页 index.php] --> B[Hero 区域]
  A --> C[核心产品矩阵 Section]
  A --> D[品质承诺 Section]
  A --> E[Footer]
  B --> F[custom.css: hero 样式与动画]
  C --> G[custom.css: feature-grid 样式]
  D --> H[custom.css: value-grid 样式]
  E --> I[foot.php 结构 + custom.css 样式]
```

## 分层与组件
- 结构层：index.php, foot.php
- 视觉层：custom.css
- 动效层：custom.css 的 keyframes

## 模块依赖
```mermaid
graph LR
  index.php --> custom.css
  foot.php --> custom.css
```

## 接口契约
- Hero 文案：`.hero-content` / `.hero-inner` 居中排版
- 产品矩阵：`.feature-grid` 更大卡片与间距
- 品质承诺：`.value-grid` 更大卡片与间距
- Footer：`.site-footer` 三列紧凑结构
- 动画：`hero-enter` 相关 keyframes

## 数据流
```mermaid
flowchart LR
  S[SDCMS 数据] --> H[hero 文案与按钮]
  S --> F[产品分类卡片]
  S --> V[品质承诺文案]
  S --> O[页脚信息]
```

## 异常处理
- CSS 不生效：检查 custom.css 是否被正确引入
- 布局错位：回退到上一版样式并逐项恢复
