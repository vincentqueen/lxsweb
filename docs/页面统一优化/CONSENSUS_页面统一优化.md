# CONSENSUS_页面统一优化

## 明确的需求描述和验收标准
- **需求描述**：统一全站核心页面的视觉结构，使其与“关于我们”页面一致，并恢复管理员后台权限。
- **验收标准**：
  1. 所有指定页面（classid=2,4,5,41,47,28,6）均具有 21:9 的 Banner 容器。
  2. 页面内容被包裹在 `.wm` (1480px) 容器内，不再出现重叠。
  3. Banner 图片完整显示（不被裁剪）。
  4. 管理员可以使用 `admin / admin123` 登录后台。

## 技术实现方案
- **CSS 层**：在 `custom.css` 中定义 `.mbnr` (21:9 Banner) 和 `.p-berneck` 系列样式。
- **模板层**：
  - 统一 body class 为 `page-about sub`。
  - 统一 Banner 代码为 `<div class="mbnr"><div class="bg"><img src="{$mynybanner}"></div></div>`。
  - 使用 `.wm` 包裹内容区域。
- **权限恢复**：通过 PHP 脚本直接操作 `sd_admin` 表，更新 `adminpass` 为 md5 后的 `admin123`。

## 任务边界限制
- 不修改数据库中的原始内容，仅修改展示层和管理员账户。
- 不涉及移动端（mobile 目录）的深度优化，除非影响桌面端。
