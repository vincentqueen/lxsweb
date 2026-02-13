# TODO_brand_optimization.md

## 待办事项与后续配置

### 1. 图片资源核对
- **描述**：当前页面引用了 `pro-1.jpg` 到 `pro-4.jpg` 以及 `sq1.jpg` 到 `sq4.jpg`。
- **操作指引**：请确保 `theme/2020/static/image/` 目录下存在这些文件。如果图片名称不同，请在 [brand.php](file:///f:/AI%20WORK/LXS/theme/2020/content/page/brand.php) 中修改对应的 `src` 路径。

### 2. 产品数据维护
- **描述**：产品介绍模块现在通过 `classid=2` 自动获取。
- **操作指引**：请在 SDCMS 后台确保“品牌”分类（ID=2）下至少有一个已发布的产品，否则该区域将显示为空白。

### 3. 花色分类数据
- **描述**：花色展示区域通过 `classid=46` 获取。
- **操作指引**：如需增加或更换显示的花色，请在后台修改分类 ID 为 46 的内容。

### 4. 移动端适配微调
- **描述**：虽然已添加基础响应式样式，但不同手机屏幕下可能仍有细微偏差。
- **操作指引**：建议在真实设备上预览，如有间距问题，可调整 [custom.css](file:///f:/AI%20WORK/LXS/theme/2020/static/css/custom.css) 中的 `@media` 查询部分。
