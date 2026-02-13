# DESIGN_页面统一优化

## 整体架构图
```mermaid
graph TD
    A[用户请求] --> B[SDCMS 路由]
    B --> C{识别 ClassID}
    C -->|ID: 1,2,4,5,41,47,6| D[单页模板 page/*.php]
    C -->|ID: 28| E[新闻列表 news/list.php]
    D --> F[统一 CSS 样式 custom.css]
    E --> F
    F --> G[最终渲染页面]
```

## 核心组件
- **Banner 组件**：`.mbnr` 类，控制 21:9 比例和 `object-fit: contain`。
- **布局容器**：`.wm` 类，固定最大宽度 1480px，水平居中。
- **内容块**：`.pbody`, `.p-berneck-profile` 等，提供统一的内边距和圆角阴影。

## 数据流向
- 页面通过 `{$mynybanner}` 获取后台配置的栏目 Banner。
- 通过 `{sdcms:rs}` 查询子栏目内容（如产品特点、荣誉资质）。

## 异常处理
- 若栏目未配置 Banner，`.mbnr` 将显示默认背景色或留空。
- SQL 错误已通过在 `news/list.php` 中显式指定表名前缀（`sd_content.classid`）解决。
