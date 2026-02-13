# ALIGNMENT_brand_optimization.md

## 项目和任务特性规范
- **项目名称**：理想树 (LXS)
- **技术栈**：SDCMS (PHP), CSS3 (Flexbox/Grid), JavaScript (jQuery, Swiper)
- **任务目标**：优化品牌页面 (classid=2, brand.php)，解决样式拉伸、间距过大、内容缺失及页脚恢复等问题，确保与原版 GitHub 仓库设计对齐。

## 原始需求
1. **Logo 拉伸修复**：修复公司介绍部分的 Logo 拉伸问题，确保其居中且比例正常。
2. **间距优化**：减小内容主体与页脚之间的间距。
3. **内容修复 (classid=2)**：
   - 恢复 3 个 div 中的缺失图片。
   - 修复产品介绍信息不全和图片缺失问题。
   - 修复花色图片显示不全的问题。
   - 添加 4 张缺失图片及授权厂家展示。
   - 恢复底部信息栏（页脚）。

## 边界确认
- **涉及文件**：
  - `theme/2020/content/page/brand.php` (页面逻辑与结构)
  - `theme/2020/static/css/custom.css` (样式调整)
  - `theme/2020/include/foot.php` (页脚组件)
- **不涉及范围**：其他页面的功能性修改，后端管理系统的逻辑变更。

## 需求理解
- **Logo 修复**：通过 CSS `object-fit: contain` 和明确的宽高限制来防止拉伸。
- **间距调整**：通过调整 `custom.css` 中的 `margin` 或 `padding` 来减小内容块与页脚的距离。
- **数据查询**：需要确保 `brand.php` 中的 SDCMS 标签正确查询 `classid=2` (品牌)、`classid=46` (花色)、`classid=26` (特点) 等相关内容。
- **页脚恢复**：检查 `foot.php` 的引用方式及容器样式。

## 疑问澄清 (智能决策)
1. **Logo 居中方式**：目前 `custom.css` 已使用 Flexbox 居中，若仍有拉伸，可能是父容器宽度被撑开。将通过重写容器样式解决。
2. **缺失图片路径**：根据分析，图片路径应为 `{WEB_THEME}static/image/` 下的相关文件。
3. **花色图片显示不全**：原版使用 Swiper，现已改为 Grid。需确认数据源查询数量是否足够（目前 `top="20"`）。
4. **页脚缺失原因**：可能是 `brand.php` 之前的版本未包含 `foot.php` 或被样式隐藏。当前代码已包含，需检查是否被 `p-berneck` 的内边距或其他元素的样式遮挡。

---
*本方案基于对现有项目的理解，优先采用与 `about.php` 一致的组件化设计（如 `p-about-profile`）。*
